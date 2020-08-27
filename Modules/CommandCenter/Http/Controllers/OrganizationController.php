<?php

namespace Modules\CommandCenter\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
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

        $getAllOrganization = $this->organizationModel->with(['periods','scope_category'])->get()->map(function ($value) {
            $data = [
                'id' => $value->id,
                'periods_id' => $value->periods_id,
                'scope_category_id' => $value->scope_category_id,
                'output' => $value->output,
                'description' => $value->description,
                'organization_file' => asset('upload/' . $value->organization_file),
                'periods' => $value->periods,
                'scope_category' => $value->scope_category
            ];
            return $data;
        }); // select * from periods;
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
        $payloadData = [
            'periods_id' => $request->periods_id,
            'scope_category_id' => $request->scope_category_id,
            'output' => $request->output,
            'description' => $request->description,
        ];
        if ($request->file('organization_file')) {
            $uploadForm = $request->file('organization_file')->store('document');
            $payloadData['organization_file'] = $uploadForm;
        }
        $createNewOrganization = $this->organizationModel->create($payloadData);
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
        $payloadData = [
            'achievement_category_id' => $request->achievement_category_id,
            'periods_id' => $request->periods_id,
            'scope_category_id' => $request->scope_category_id,
            'achievement_name' => $request->achievement_name,
            'description' => $request->description,
        ];
        if($request->file('organization_file')){
            if(Storage::exists($findOrganization->organization_file)){
                Storage::delete(($findOrganization->organization_file));

                
                
            }
            $uploadForm = $request->file('organization_file')->store('document');
            $payloadData['organization_file'] = $uploadForm;

        }
        $findOrganization->update($payloadData);
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
