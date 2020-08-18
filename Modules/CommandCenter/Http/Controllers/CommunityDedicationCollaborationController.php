<?php

namespace Modules\CommandCenter\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
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
        $getAllCommunityDedicationCollaboration = $this->communitydedicationcollaborationModel->with('collaboration_scope','collaboration_periods','evaluation_periods')->get(); // select * from periods;
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
        $createNewCommunityDedicationCollaboration = $this->communitydedicationcollaborationModel->create([
            'collaboration_scope_id' => $request->collaboration_scope_id,
            'collaboration_periods_id' => $request->collaboration_periods_id,
            'evaluation_periods_id' => $request->evaluation_periods_id,
            'mou_file' => $request->mou_file,
            'moa_file' => $request->moa_file,
            'supporting_file' => $request->supporting_file,
        ]);
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
        $findCommunityDedicationCollaboration->update([
            'collaboration_scope_id' => $request->collaboration_scope_id,
            'collaboration_periods_id' => $request->collaboration_periods_id,
            'evaluation_periods_id' => $request->evaluation_periods_id,
            'mou_file' => $request->mou_file,
            'moa_file' => $request->moa_file,
            'supporting_file' => $request->supporting_file,
        ]);
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
