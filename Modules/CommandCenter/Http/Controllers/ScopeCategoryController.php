<?php

namespace Modules\CommandCenter\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\CommandCenter\Entities\ScopeCategory;

class ScopeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    private $scopecategoryModel;
    public function __construct()
    {
        $this->scopecategoryModel = new ScopeCategory();
    }

    public function index()
    {
        $getAllScopeCategory = $this->scopecategoryModel->get(); // select * from periods;
        return response()->json($getAllScopeCategory);
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
        $createNewScopeCategory = $this->scopecategoryModel->create([
            'scope_name' => $request->scope_name,
        ]);
        return response()->json($createNewScopeCategory);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $findScopeCategory = $this->scopecategoryModel->find($id);
        return response()->json($findScopeCategory);
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
        $findScopeCategory = $this->scopecategoryModel->find($id);
        $findScopeCategory->update([
            'scope_name' => $request->scope_name,
        ]);
        return response()->json($findScopeCategory);
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
