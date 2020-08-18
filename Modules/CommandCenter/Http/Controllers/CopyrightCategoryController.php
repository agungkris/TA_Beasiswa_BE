<?php

namespace Modules\CommandCenter\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\CommandCenter\Entities\CopyrightCategory;

class CopyrightCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    private $copyrightcategoryModel;
    public function __construct()
    {
        $this->copyrightcategoryModel = new CopyrightCategory();
    }

    public function index()
    {
        $getAllCopyrightCategory = $this->copyrightcategoryModel->get(); // select * from periods;
        return response()->json($getAllCopyrightCategory);
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
        $createNewCopyrightCategory = $this->copyrightcategoryModel->create([
            'copyright_category_name' => $request->copyright_category_name,
        ]);
        return response()->json($createNewCopyrightCategory);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $findCopyrightCategory = $this->copyrightcategoryModel->find($id);
        return response()->json($findCopyrightCategory);
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
        $findCopyrightCategory = $this->copyrightcategoryModel->find($id);
        $findCopyrightCategory->update([
            'copyright_category_name' => $request->copyright_category_name,
        ]);
        return response()->json($findCopyrightCategory);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $findCopyrightCategory = $this->copyrightcategoryModel->find($id);
        $findCopyrightCategory->delete();
        return response()->json($findCopyrightCategory);
    }
}
