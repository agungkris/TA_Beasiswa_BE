<?php

namespace App\Http\Controllers\CommandCenter;

use App\Period;
use Illuminate\Http\Request;

class PeriodController extends Controller
{
    private $periodModel;
    public function __construct()
    {
        $this->periodModel = new Period();
    }


    public function index(){
        $getAllPeriod = $this->periodModel->get(); // select * from periods;
        return response()->json($getAllPeriod);
    }

    public function store(Request $request){
        $createNewPeriod = $this->periodModel->create([
            'period_name' => $request->period_name,
            'description' => $request->description
        ]);
        return response()->json($createNewPeriod);
    }

    public function show($id){
        $findPeriod = $this->periodModel->find($id);
        return response()->json($findPeriod);
    }

    public function update($id,Request $request){
        $findPeriod = $this->periodModel->find($id);
        $findPeriod->update([
            'period_name' => $request->period_name,
            'description' => $request->description
        ]);
        return response()->json($findPeriod);
    }

    public function destroy($id){
        $findPeriod = $this->periodModel->find($id);
        $findPeriod->delete();
        return response()->json($findPeriod);
    }
}
