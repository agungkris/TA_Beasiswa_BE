<?php

namespace Modules\Scholarship\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Scholarship\Entities\ScholarshipFinancialReports;

class ScholarshipFinancialReportsController extends Controller
{
    private $financialModel;
    public function __construct()
    {
        $this->financialModel = new ScholarshipFinancialReports();
    }

    public function index(Request $request)
    {
        $getAllFinancial = $this->financialModel->with('semester', 'student', 'achievement')->get();
        if ($request->student_id) {
            $getAllFinancial = $getAllFinancial->where('student_id', $request->student_id);
        }
        return response()->json($getAllFinancial);
    }

    public function store(Request $request)
    {
        $createNewFinancial = $this->financialModel->create([
            'achievement_id' => $request->achievement_id,
            'semester_id' => $request->semester_id,
            'student_id' => auth()->id(),
            'spp' => $request->spp,
            'sks' => $request->sks,
            'result' => $request->result,
            'amount' => $request->amount,
        ]);
        return response()->json($createNewFinancial);
    }

    public function show($id)
    {
        $findFinancial = $this->financialModel->find($id);
        return response()->json($findFinancial);
    }

    public function update($id, Request $request)
    {
        $findFinancial = $this->financialModel->find($id);
        $findFinancial->update([
            'achievement_id' => $request->achievement_id,
            'semester_id' => $request->semester_id,
            'student_id' => auth()->id(),
            'spp' => $request->spp,
            'sks' => $request->sks,
            'result' => $request->result,
            'amount' => $request->amount,
        ]);
        return response()->json($findFinancial);
    }

    public function destroy($id)
    {
        $findFinancial = $this->financialModel->find($id);
        $findFinancial->delete();
        return response()->json($findFinancial);
    }
}
