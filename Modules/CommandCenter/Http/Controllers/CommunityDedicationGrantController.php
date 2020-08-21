<?php

namespace Modules\CommandCenter\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
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
        $getAllCommunityDedicationGran = $this->communitydedicationgrantModel->with(['periods','scope_category'])->get()->map(function ($value) {
            $data = [
                'id' => $value->id,
                'periods_id' => $value->periods_id,
                'scope_category_id' => $value->scope_category_id,
                'grant_file' => asset('upload/' . $value->grant_file),
                'description' => $value->description,
                'periods' => $value->periods,
                'scope_category' => $value->scope_category
            ];
            return $data;
        }); // select * from periods;
        return response()->json($getAllCommunityDedicationGran);

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
            'description' => $request->description,
        ];
        if ($request->file('grant_file')) {
            $uploadForm = $request->file('grant_file')->store('document');
            $payloadData['grant_file'] = $uploadForm;
        }
        $createNewCommunityDedicationGrant = $this->communitydedicationgrantModel->create($payloadData);
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
        $payloadData = [
            'periods_id' => $request->periods_id,
            'scope_category_id' => $request->scope_category_id,
            'description' => $request->description,
        ];
        if($request->file('grant_file')){
            if(Storage::exists($findCommunityDedicationGrant->grant_file)){
                Storage::delete(($findCommunityDedicationGrant->grant_file));

                
                
            }
            $uploadForm = $request->file('grant_file')->store('document');
            $payloadData['grant_file'] = $uploadForm;

        }
        $findCommunityDedicationGrant->update($payloadData);
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
