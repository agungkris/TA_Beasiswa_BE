<?php

namespace Modules\CommandCenter\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\CommandCenter\Entities\CollaborationPeriods;

class CollaborationPeriodsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    private $collaborationperiodsModel;
    public function __construct()
    {
        $this->collaborationperiodsModel = new CollaborationPeriods();
    }

    public function index()
    {
        $getAllCollaborationPeriods = $this->collaborationperiodsModel->get(); // select * from periods;
        return response()->json($getAllCollaborationPeriods);
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
        $createNewCollaborationPeriods = $this->collaborationperiodsModel->create([
            'collaboration_periods_name' => $request->collaboration_periods_name,
        ]);
        return response()->json($createNewCollaborationPeriods);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $findCollaborationPeriods = $this->collaborationperiodsModel->find($id);
        return response()->json($findCollaborationPeriods);
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
        $findCollaborationPeriods = $this->collaborationperiodsModel->find($id);
        $findCollaborationPeriods->update([
            'collaboration_periods_name' => $request->collaboration_periods_name,
        ]);
        return response()->json($findCollaborationPeriods);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $findCollaborationPeriods = $this->collaborationperiodsModel->find($id);
        $findCollaborationPeriods->delete();
        return response()->json($findCollaborationPeriods);
    }
}
