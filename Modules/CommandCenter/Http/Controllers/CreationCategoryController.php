<?php

namespace Modules\CommandCenter\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\CommandCenter\Entities\CreationCategory;

class CreationCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    private $creationcategoryModel;
    public function __construct()
    {
        $this->creationcategoryModel = new CreationCategory();
    }

    public function index()
    {
        $getAllCreationCategory = $this->creationcategoryModel->get(); // select * from periods;
        return response()->json($getAllCreationCategory);
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
        $createNewCreationCategory = $this->creationcategoryModel->create([
            'creation_category_name' => $request->creation_category_name,
        ]);
        return response()->json($createNewCreationCategory);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $findCreationCategory = $this->creationcategoryModel->find($id);
        return response()->json($findCreationCategory);
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
        $findCreationCategory = $this->creationcategoryModel->find($id);
        $findCreationCategory->update([
            'creation_category_name' => $request->creation_category_name,
        ]);
        return response()->json($findCreationCategory);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $findCreationCategory = $this->creationcategoryModel->find($id);
        $findCreationCategory->delete();
        return response()->json($findCreationCategory);
    }
}
