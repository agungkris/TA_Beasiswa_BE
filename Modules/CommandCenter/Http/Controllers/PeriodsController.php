<?php

namespace Modules\CommandCenter\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\CommandCenter\Entities\Periods;

class PeriodsController extends Controller
{
    private $periodModel;
    public function __construct()
    {
        $this->periodModel = new Periods();
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $getAllPeriode = $this->periodModel->get(); // select * from periods;
        return response()->json($getAllPeriode);
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
        $createNewPeriod = $this->periodModel->create([
            'period_name' => $request->period_name,
        ]);
        return response()->json($createNewPeriod);
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $findPeriod = $this->periodModel->find($id);
        return response()->json($findPeriod);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function update($id, Request $request)
    {
        $findPeriod = $this->periodModel->find($id);
        $findPeriod->update([
            'period_name' => $request->period_name,
        ]);
        return response()->json($findPeriod);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    // public function destroy($id)
    // {
    //     $findPeriod = $this->periodModel->find($id);
    //     $findPeriod->delete();
    //     return response()->json($findPeriod);
    // }
}
