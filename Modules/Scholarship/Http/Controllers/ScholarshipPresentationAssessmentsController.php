<?php

namespace Modules\Scholarship\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Auth\Entities\User;
use Modules\Scholarship\Entities\ScholarshipPresentationAssessments;
use Modules\Scholarship\Entities\ScholarshipSubmissions;

use function PHPSTORM_META\map;

class ScholarshipPresentationAssessmentsController extends Controller
{
    private $scholarshipPresentationAssessmentsModel;
    public function __construct()
    {
        $this->scholarshipPresentationAssessmentsModel = new ScholarshipPresentationAssessments();
        $this->scholarshipSubmissionModel = new ScholarshipSubmissions();
    }

    public function report(Request $request)
    {
        $getAllPresentationAssessments = $this->scholarshipPresentationAssessmentsModel->with('period', 'jury', 'student.student_group')
            ->where('period_id', $request->period_id)->where('student_id', $request->student_id)->get();


        return response()->json($getAllPresentationAssessments);
        // $periodId = $request->period_id ?? null;
        // if ($request->filled('period_id')) {
        // $getAllPaperAssessments = $getAllPaperAssessments->where('period_id', $periodId);
    }

    public function index()
    {
        // $testing = User::with('group')->find(2);

        // // dd($testing->group);

        $getAllPresentationAssessments = $this->scholarshipPresentationAssessmentsModel->with('period', 'jury')->get(); // select * from PresentationAssessmentss;
        // dd($getAllPresentationAssessments);
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

        $periodId = $request->period_id;
        $studentId = $request->student_id;
        $getStudentSubmission = $this->scholarshipSubmissionModel->where('period_id', $periodId)->where('student_id', $studentId)->first();

        $createNewPresentationAssessments = $this->scholarshipPresentationAssessmentsModel->updateorcreate([
            'period_id' => $request->period_id,
            'jury_id' => $request->jury_id,
            'student_id' => $request->student_id,
        ], [
            'period_id' => $request->period_id,
            'jury_id' => $request->jury_id,
            'student_id' => $request->student_id,
            'submission_id' => $getStudentSubmission->id,
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
        $findPresentationAssessments = $this->scholarshipPresentationAssessmentsModel->with('student.group')->find($id);
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

    // UNTUK PENJUMLAHAN AKHIR
    // public function final(Request $request)
    // {
    //     $getAllPresentationAssessments = $this->scholarshipPresentationAssessmentsModel->all('period');
    //     $getAllPresentationAssessments->map(function($item,$key){
    //         $item->final_score
    //     });

    //     return response()->json($getAllPresentationAssessments);
    // }
}
