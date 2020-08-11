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
        $createNewPresentationAssessments = $this->scholarshipPresentationAssessmentsModel->create([
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
            'score' => $request->score
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
            'score' => $request->score
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
