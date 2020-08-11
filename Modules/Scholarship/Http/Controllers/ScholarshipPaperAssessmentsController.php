<?php

namespace Modules\Scholarship\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Scholarship\Entities\ScholarshipPaperAssessments;

class ScholarshipPaperAssessmentsController extends Controller
{
    private $scholarshipPaperAssessmentsModel;
    public function __construct()
    {
        $this->scholarshipPaperAssessmentsModel = new ScholarshipPaperAssessments();
    }


    public function index()
    {
        $getAllPaperAssessments = $this->scholarshipPaperAssessmentsModel->with('period', 'jury', 'student')->get(); // select * from PaperAssessmentss;
        // select * from student_groups inner join period on periode.id = student_groups.period_id;
        return response()->json($getAllPaperAssessments);
    }

    public function store(Request $request)
    {
        $createNewPaperAssessments = $this->scholarshipPaperAssessmentsModel->create([
            'period_id' => $request->period_id,
            'jury_id' => $request->jury_id,
            'student_id' => $request->student_id,
            'format_papers' => $request->format_papers,
            'creativity' => $request->creativity,
            'contribution' => $request->contribution,
            'information' => $request->information,
            'conclusion' => $request->conclusion,
            'comment' => $request->comment,
            'score' => $request->score
        ]);
        return response()->json($createNewPaperAssessments);
    }

    public function show($id)
    {
        $findPaperAssessments = $this->scholarshipPaperAssessmentsModel->find($id);
        return response()->json($findPaperAssessments);
    }

    public function update($id, Request $request)
    {
        $findPaperAssessments = $this->scholarshipPaperAssessmentsModel->find($id);
        $findPaperAssessments->update([
            'period_id' => $request->period_id,
            'jury_id' => $request->jury_id,
            'student_id' => $request->student_id,
            'format_papers' => $request->format_papers,
            'creativity' => $request->creativity,
            'contribution' => $request->contribution,
            'information' => $request->information,
            'conclusion' => $request->conclusion,
            'comment' => $request->comment,
            'score' => $request->score
        ]);
        return response()->json($findPaperAssessments);
    }

    public function destroy($id)
    {
        $findPaperAssessments = $this->scholarshipPaperAssessmentsModel->find($id);
        $findPaperAssessments->delete();
        return response()->json($findPaperAssessments);
    }
}
