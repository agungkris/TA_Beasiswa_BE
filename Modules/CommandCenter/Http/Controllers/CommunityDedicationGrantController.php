<?php

namespace Modules\CommandCenter\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\CommandCenter\Entities\CommunityDedicationGrant;

class CommunityDedicationGrantController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    private $communitydedicationgrantModel;
    public function __construct()
    {
        $this->communitydedicationgrantModel = new CommunityDedicationGrant();
    }

    public function index()
    {
        $getAllCommunityDedicationGrant = $this->communitydedicationgrantModel->with('scope_category','periods')->get(); // select * from periods;
        return response()->json($getAllCommunityDedicationGrant);
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
        $createNewCommunityDedicationGrant = $this->communitydedicationgrantModel->create([
            'scope_category_id' => $request->scope_category_id,
            'periods_id' => $request->periods_id,
            'grant_file' => $request->grant_file,
            'description' => $request->description,
        ]);
        return response()->json($createNewCommunityDedicationGrant);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $findCommunityDedicationGrant = $this->communitydedicationgrantModel->find($id);
        return response()->json($findCommunityDedicationGrant);
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
        $findCommunityDedicationGrant = $this->communitydedicationgrantModel->find($id);
        $findCommunityDedicationGrant->update([
            'scope_category_id' => $request->scope_category_id,
            'periods_id' => $request->periods_id,
            'grant_file' => $request->grant_file,
            'description' => $request->description,
        ]);
        return response()->json($findCommunityDedicationGrant);
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
