<?php

namespace Modules\Scholarship\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Scholarship\Entities\ScholarshipPresentationAssessments;

class ScholarshipPresentationAssessmentsController extends Controller
{
    private $scholarshipPresentationAssessmentsModel;
    public function __construct()
    {
        $this->scholarshipPresentationAssessmentsModel = new ScholarshipPresentationAssessments();
    }


    public function index()
    {
        $getAllPresentationAssessments = $this->scholarshipPresentationAssessmentsModel->with('period', 'jury', 'student')->get(); // select * from PresentationAssessmentss;
        // select * from student_groups inner join period on periode.id = student_groups.period_id;
        return response()->json($getAllPresentationAssessments);
    }

    public function store(Request $request)
    {
        $score_A = $request->score_A / 10;
        $score_B = $request->score_B / 10;
        $score_C = $request->score_C / 10;
        $score_D = $request->score_D / 10;
        $score_E = $request->score_E / 10;
        $score_F = $request->score_F / 10;
        $score_G = $request->score_G / 10;
        $score_H = $request->score_H / 10;
        $score_I = $request->score_I / 10;
        $score_J = $request->score_J / 10;
        $score = $score_A + $score_B + $score_C + $score_D + $score_E + $score_F + $score_G + $score_H + $score_I + $score_J;


        $createNewPresentationAssessments = $this->scholarshipPresentationAssessmentsModel->updateorcreate([
            'period_id' => $request->period_id,
            'jury_id' => $request->jury_id,
            'student_id' => $request->student_id,
        ], [
            'period_id' => $request->period_id,
            'jury_id' => $request->jury_id,
            'student_id' => $request->student_id,
            'score_A' => $request->score_A,
            'score_B' => $request->score_B,
            'score_C' => $request->score_C,
            'score_D' => $request->score_D,
            'score_E' => $request->score_E,
            'score_F' => $request->score_F,
            'score_G' => $request->score_G,
            'score_H' => $request->score_H,
            'score_I' => $request->score_I,
            'score_J' => $request->score_J,
            'final_score' => $score ?? 0
        ]);
        return response()->json($createNewPresentationAssessments);
    }

    public function show($id)
    {
        $findPresentationAssessments = $this->scholarshipPresentationAssessmentsModel->find($id);
        return response()->json($findPresentationAssessments);
    }

    public function update($id, Request $request)
    {
        $findPresentationAssessments = $this->scholarshipPresentationAssessmentsModel->find($id);
        $findPresentationAssessments->update([
            'period_id' => $request->period_id,
            'jury_id' => $request->jury_id,
            'student_id' => $request->student_id,
            'score_A' => $request->score_A,
            'score_B' => $request->score_B,
            'score_C' => $request->score_C,
            'score_D' => $request->score_D,
            'score_E' => $request->score_E,
            'score_F' => $request->score_F,
            'score_G' => $request->score_G,
            'score_H' => $request->score_H,
            'score_I' => $request->score_I,
            'score_J' => $request->score_J,
            'final_score' => $score ?? 0
        ]);
        return response()->json($findPresentationAssessments);
    }

    public function destroy($id)
    {
        $findPresentationAssessments = $this->scholarshipPresentationAssessmentsModel->find($id);
        $findPresentationAssessments->delete();
        return response()->json($findPresentationAssessments);
    }
}
