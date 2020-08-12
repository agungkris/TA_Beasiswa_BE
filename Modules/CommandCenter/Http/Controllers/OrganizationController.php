<?php

namespace Modules\CommandCenter\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\CommandCenter\Entities\Organization;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    private $organizationModel;
    public function __construct()
    {
        $this->organizationModel = new Organization();
    }

    public function index()
    {
        $getAllOrganization = $this->organizationModel->with('periods','scope_category')->get(); // select * from periods;
        return response()->json($getAllOrganization);
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
        $createNewOrganization = $this->organizationModel->create([
            'periods_id' => $request->periods_id,
            'scope_category_id' => $request->scope_category_id,
            'output' => $request->output,
            'description' => $request->description,
            'organization_file' => $request->organization_file,
        ]);
        return response()->json($createNewOrganization);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $findOrganization = $this->organizationModel->find($id);
        return response()->json($findOrganization);
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
        $findOrganization = $this->organizationModel->find($id);
        $findOrganization->update([
            'periods_id' => $request->periods_id,
            'scope_category_id' => $request->scope_category_id,
            'output' => $request->output,
            'description' => $request->description,
            'organization_file' => $request->organization_file,
        ]);
        return response()->json($findOrganization);
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
