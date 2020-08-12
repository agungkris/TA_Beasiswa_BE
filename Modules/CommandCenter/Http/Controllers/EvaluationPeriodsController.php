<?php

namespace Modules\CommandCenter\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\CommandCenter\Entities\EvaluationPeriods;

class EvaluationPeriodsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    private $evaluationperiodsModel;
    public function __construct()
    {
        $this->evaluationperiodsModel = new EvaluationPeriods();
    }

    public function index()
    {
        $getAllEvaluationPeriods = $this->evaluationperiodsModel->get(); // select * from periods;
        return response()->json($getAllEvaluationPeriods);
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
        $createNewEvaluationPeriods = $this->evaluationperiodsModel->create([
            'evaluation_periods_name' => $request->evaluation_periods_name,
        ]);
        return response()->json($createNewEvaluationPeriods);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $findEvaluationPeriods = $this->evaluationperiodsModel->find($id);
        return response()->json($findEvaluationPeriods);
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
        $findEvaluationPeriods = $this->evaluationperiodsModel->find($id);
        $findEvaluationPeriods->update([
            'evaluation_periods_name' => $request->evaluation_periods_name,
        ]);
        return response()->json($findEvaluationPeriods);
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
