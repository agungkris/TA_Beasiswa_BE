<?php

namespace Modules\Scholarship\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Scholarship\Entities\ScholarshipPaperAssessments;
use Modules\Scholarship\Entities\ScholarshipSubmissions;

class ScholarshipPaperAssessmentsController extends Controller
{
    private $scholarshipPaperAssessmentsModel;
    public function __construct()
    {
        $this->scholarshipPaperAssessmentsModel = new ScholarshipPaperAssessments();
        $this->scholarshipSubmissionModel = new ScholarshipSubmissions();
    }

    public function report(Request $request)
    {
        $getAllPaperAssessments = $this->scholarshipPaperAssessmentsModel->with('period', 'jury', 'student')
            ->where('period_id', $request->period_id)->where('student_id', $request->student_id)->first();


        return response()->json($getAllPaperAssessments);
        // $periodId = $request->period_id ?? null;
        // if ($request->filled('period_id')) {
        // $getAllPaperAssessments = $getAllPaperAssessments->where('period_id', $periodId);
    }

    public function index(Request $request)
    {
        $getAllPaperAssessments = $this->scholarshipPaperAssessmentsModel->with('period', 'jury', 'student')->get(); // select * from PaperAssessmentss;
        // select * from student_groups inner join period on periode.id = student_groups.period_id;
        $periodId = $request->period_id ?? null;
        $getAllPaperAssessments = $getAllPaperAssessments->where('period_id', $periodId);

        return response()->json($getAllPaperAssessments);
    }

    public function store($id, Request $request)
    {

        $formatPapers = $request->format_papers * (10 / 100);
        $creativity = $request->creativity * (30 / 100);
        $contribution = $request->contribution * (25 / 100);
        $information = $request->information * (20 / 100);
        $conclusion = $request->conclusion * (15 / 100);

        $papers_score = $formatPapers + $creativity + $contribution + $information + $conclusion;

        $periodId = $request->period_id;
        $studentId = $request->student_id;


        $getStudentSubmission = $this->scholarshipSubmissionModel->where('period_id', $periodId)->where('student_id', $studentId)->first();


        $createNewPaperAssessments = $this->scholarshipPaperAssessmentsModel->updateOrCreate([
            'period_id' => $request->period_id,
            'jury_id' => $request->jury_id,
            'student_id' => $studentId,
        ], [
            'period_id' => $request->period_id,
            'jury_id' => $request->jury_id,
            'submission_id' => $getStudentSubmission->id,
            'student_id' => $studentId,
            'format_papers' => $request->format_papers,
            'creativity' => $request->creativity,
            'contribution' => $request->contribution,
            'information' => $request->information,
            'conclusion' => $request->conclusion,
            'comment' => $request->comment,
            'papers_score' => $papers_score ?? 0
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
            'papers_score' => $request->papers_score
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
