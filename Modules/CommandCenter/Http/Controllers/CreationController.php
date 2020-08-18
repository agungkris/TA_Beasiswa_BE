<?php

namespace Modules\CommandCenter\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\CommandCenter\Entities\Creation;

class CreationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    private $creationModel;
    public function __construct()
    {
        $this->creationModel = new Creation();
    }

    public function index()
    {
        $getAllCreation = $this->creationModel->with('creation_category','periods','scope_category')->get(); // select * from periods;
        return response()->json($getAllCreation);
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
        $createNewCreation = $this->creationModel->create([
            'creation_category_id' => $request->creation_category_id,
            'periods_id' => $request->periods_id,
            'scope_category_id' => $request->scope_category_id,
            'creation_name' => $request->creation_name,
            'description' => $request->description,
            'creation_file' => $request->creation_file,
        ]);
        return response()->json($createNewCreation);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $findCreation = $this->creationModel->find($id);
        return response()->json($findCreation);
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
        $findCreation = $this->creationModel->find($id);
        $findCreation->update([
            'creation_category_id' => $request->creation_category_id,
            'periods_id' => $request->periods_id,
            'scope_category_id' => $request->scope_category_id,
            'creation_name' => $request->creation_name,
            'description' => $request->description,
            'creation_file' => $request->creation_file,
        ]);
        return response()->json($findCreation);
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
