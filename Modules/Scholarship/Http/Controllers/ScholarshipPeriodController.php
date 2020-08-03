<?php

namespace Modules\Scholarship\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Scholarship\Entities\ScholarshipPeriod;

class ScholarshipPeriodController extends Controller
{
    private $periodModel;
    public function __construct()
    {
        $this->periodModel = new ScholarshipPeriod();
    }


    public function index()
    {
        $getAllPeriode = $this->periodModel->get(); // select * from periods;
        return response()->json($getAllPeriode);
    }

    public function store(Request $request)
    {
        $createNewPeriod = $this->periodModel->create([
            'name' => $request->name,
        ]);
        return response()->json($createNewPeriod);
    }

    public function show($id)
    {
        $findPeriod = $this->periodModel->find($id);
        return response()->json($findPeriod);
    }

    public function update($id, Request $request)
    {
        $findPeriod = $this->periodModel->find($id);
        $findPeriod->update([
            'name' => $request->name,
        ]);
        return response()->json($findPeriod);
    }

    public function destroy($id)
    {
        $findPeriod = $this->periodModel->find($id);
        $findPeriod->delete();
        return response()->json($findPeriod);
    }
}
