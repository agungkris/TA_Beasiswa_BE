<?php

namespace Modules\CommandCenter\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\CommandCenter\Entities\PublicationCategory;

class PublicationCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    private $publicationcategoryModel;
    public function __construct()
    {
        $this->publicationcategoryModel = new PublicationCategory();
    }

    public function index()
    {
        $getAllPublicationCategory = $this->publicationcategoryModel->get(); // select * from periods;
        return response()->json($getAllPublicationCategory);
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
        $createNewPublicationCategory = $this->publicationcategoryModel->create([
            'publication_category_name' => $request->publication_category_name,
        ]);
        return response()->json($createNewPublicationCategory);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $findPublicationCategory = $this->publicationcategoryModel->find($id);
        return response()->json($findPublicationCategory);
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
        $findPublicationCategory = $this->publicationcategoryModel->find($id);
        $findPublicationCategory->update([
            'publication_category_name' => $request->publication_category_name,
        ]);
        return response()->json($findPublicationCategory);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $findPublicationCategory = $this->publicationcategoryModel->find($id);
        $findPublicationCategory->delete();
        return response()->json($findPublicationCategory);
    }
}
