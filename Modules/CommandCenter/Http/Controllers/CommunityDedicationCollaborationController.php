<?php

namespace Modules\CommandCenter\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Modules\CommandCenter\Entities\CommunityDedicationCollaboration;

class CommunityDedicationCollaborationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    private $communitydedicationcollaborationModel;
    public function __construct()
    {
        $this->communitydedicationcollaborationModel = new CommunityDedicationCollaboration();
    }

    public function index()
    {
        $getAllCommunityDedicationCollaboration = $this->communitydedicationcollaborationModel->with(['collaboration_scope','collaboration_periods','evaluation_periods'])->get()->map(function ($value) {
            $data = [
                'id' => $value->id,
                'collaboration_scope_id' => $value->collaboration_scope_id,
                'collaboration_periods_id' => $value->collaboration_periods_id,
                'evaluation_periods_id' => $value->evaluation_periods_id,
                'mou_file' => asset('upload/' . $value->mou_file),
                'moa_file' => asset('upload/' . $value->moa_file),
                'supporting_file' => asset('upload/' . $value->supporting_file),
                'collaboration_scope' => $value->collaboration_scope,
                'collaboration_periods' => $value->collaboration_periods,
                'evaluation_periods' => $value->evaluation_periods
            ];
            return $data;
        }); // select * from periods;
        return response()->json($getAllCommunityDedicationCollaboration);
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
            'collaboration_scope_id' => $request->collaboration_scope_id,
            'collaboration_periods_id' => $request->collaboration_periods_id,
            'evaluation_periods_id' => $request->evaluation_periods_id,
        ];
        if ($request->file('mou_file')) {
            $uploadForm = $request->file('mou_file')->store('document');
            $payloadData['mou_file'] = $uploadForm;
        }
        if ($request->file('moa_file')) {
            $uploadForm = $request->file('moa_file')->store('document');
            $payloadData['moa_file'] = $uploadForm;
        }
        if ($request->file('supporting_file')) {
            $uploadForm = $request->file('supporting_file')->store('document');
            $payloadData['supporting_file'] = $uploadForm;
        }
        $createNewCommunityDedicationCollaboration = $this->communitydedicationcollaborationModel->create($payloadData);
        return response()->json($createNewCommunityDedicationCollaboration);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $findCommunityDedicationCollaboration = $this->communitydedicationcollaborationModel->find($id);
        return response()->json($findCommunityDedicationCollaboration);
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
        $findCommunityDedicationCollaboration = $this->communitydedicationcollaborationModel->find($id);
        $payloadData = [
            'collaboration_scope_id' => $request->collaboration_scope_id,
            'collaboration_periods_id' => $request->collaboration_periods_id,
            'evaluation_periods_id' => $request->evaluation_periods_id,
        ];
        if($request->file('mou_file')){
            if(Storage::exists($findCommunityDedicationCollaboration->mou_file)){
                Storage::delete(($findCommunityDedicationCollaboration->mou_file));

                
                
            }
            $uploadForm = $request->file('mou_file')->store('document');
            $payloadData['mou_file'] = $uploadForm;

        }
        if($request->file('moa_file')){
            if(Storage::exists($findCommunityDedicationCollaboration->moa_file)){
                Storage::delete(($findCommunityDedicationCollaboration->moa_file));

                
                
            }
            $uploadForm = $request->file('moa_file')->store('document');
            $payloadData['moa_file'] = $uploadForm;

        }
        if($request->file('supporting_file')){
            if(Storage::exists($findCommunityDedicationCollaboration->supporting_file)){
                Storage::delete(($findCommunityDedicationCollaboration->supporting_file));

                
                
            }
            $uploadForm = $request->file('supporting_file')->store('document');
            $payloadData['supporting_file'] = $uploadForm;

        }
        $findCommunityDedicationCollaboration->update($payloadData);
        return response()->json($findCommunityDedicationCollaboration);

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
