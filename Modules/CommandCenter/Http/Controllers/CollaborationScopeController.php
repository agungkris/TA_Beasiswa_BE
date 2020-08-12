<?php

namespace Modules\CommandCenter\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\CommandCenter\Entities\CollaborationScope;

class CollaborationScopeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    private $collaborationscopeModel;
    public function __construct()
    {
        $this->collaborationscopeModel = new CollaborationScope();
    }

    public function index()
    {
        $getAllCollaborationScope = $this->collaborationscopeModel->get(); // select * from periods;
        return response()->json($getAllCollaborationScope);
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
        $createNewCollaborationScope = $this->collaborationscopeModel->create([
            'collaboration_scope_name' => $request->collaboration_scope_name,
        ]);
        return response()->json($createNewCollaborationScope);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $findCollaborationScope = $this->collaborationscopeModel->find($id);
        return response()->json($findCollaborationScope);
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
        $findCollaborationScope = $this->collaborationscopeModel->find($id);
        $findCollaborationScope->update([
            'collaboration_scope_name' => $request->collaboration_scope_name,
        ]);
        return response()->json($findCollaborationScope);
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
