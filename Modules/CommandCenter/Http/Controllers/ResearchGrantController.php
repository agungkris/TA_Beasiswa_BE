<?php

namespace Modules\CommandCenter\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\CommandCenter\Entities\ResearchGrant;

class ResearchGrantController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    private $researchgrantModel;
    public function __construct()
    {
        $this->researchgrantModel = new ResearchGrant();
    }

    public function index()
    {
        $getAllResearchGrant = $this->researchgrantModel->with('scope_category','periods')->get(); // select * from periods;
        return response()->json($getAllResearchGrant);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $createNewResearchGrant = $this->researchgrantModel->create([
            'scope_category_id' => $request->scope_category_id,
            'periods_id' => $request->periods_id,
            'grant_file' => $request->grant_file,
            'description' => $request->description,
        ]);
        return response()->json($createNewResearchGrant);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $findResearchGrant = $this->researchgrantModel->find($id);
        return response()->json($findResearchGrant);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('commandcenter::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update($id, Request $request)
    {
        $findResearchGrant = $this->researchgrantModel->find($id);
        $findResearchGrant->update([
            'scope_category_id' => $request->scope_category_id,
            'periods_id' => $request->periods_id,
            'grant_file' => $request->grant_file,
            'description' => $request->description,
        ]);
        return response()->json($findResearchGrant);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
