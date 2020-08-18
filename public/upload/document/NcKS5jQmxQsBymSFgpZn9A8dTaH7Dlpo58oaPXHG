<?php

namespace Modules\Scholarship\Http\Controllers;

use App\Period;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Modules\Scholarship\Entities\ScholarshipSubmissions;

class ScholarshipSubmissionsController extends Controller
{
    private $scholarshipSubmissionsModel;
    public function __construct()
    {
        $this->scholarshipSubmissionsModel = new ScholarshipSubmissions();
    }


    public function index()
    {
        $getAllSubmissions = $this->scholarshipSubmissionsModel->with('period', 'student')->get(); // select * from Submissionss;
        // select * from student_groups inner join period on periode.id = student_groups.period_id;
        return response()->json($getAllSubmissions);
    }

    public function store(Request $request)
    {
        $payloadData = [
            'student_id' => auth()->id(),
            'period_id' => $request->period_id
        ];
        if ($request->file('submit_form')) {
            // if (Storage::exists($findSubmissions->submit_form)) {
            //     Storage::delete($findSubmissions->submit_form);
            // }
            $uploadForm = $request->file('submit_form')->store('document');
            $payloadData['submit_form'] = $uploadForm;
        }
        if ($request->file('brs')) {
            // if (Storage::exists($findSubmissions->brs)) {
            //     Storage::delete($findSubmissions->brs);
            // }
            $uploadForm = $request->file('brs')->store('document');
            $payloadData['brs'] = $uploadForm;
        }
        if ($request->file('raport')) {
            // if (Storage::exists($findSubmissions->raport)) {
            //     Storage::delete($findSubmissions->raport);
            // }
            $uploadForm = $request->file('raport')->store('document');
            $payloadData['raport'] = $uploadForm;
        }
        if ($request->file('cv')) {
            // if (Storage::exists($findSubmissions->cv)) {
            //     Storage::delete($findSubmissions->cv);
            // }
            $uploadForm = $request->file('cv')->store('document');
            $payloadData['cv'] = $uploadForm;
        }
        if ($request->file('papers')) {
            // if (Storage::exists($findSubmissions->papers)) {
            //     Storage::delete($findSubmissions->papers);
            // }
            $uploadForm = $request->file('papers')->store('document');
            $payloadData['papers'] = $uploadForm;
        }
        if ($request->file('other_requirements')) {
            // if (Storage::exists($findSubmissions->other_requirements)) {
            //     Storage::delete($findSubmissions->other_requirements);
            // }
            $uploadForm = $request->file('other_requirements')->store('document');
            $payloadData['other_requirements'] = $uploadForm;
        }
        $createNewScholarshipSubmissions = $this->scholarshipSubmissionsModel->updateOrCreate([
            'student_id' => auth()->id(),
            'period_id' => $request->period_id,
            'presentation' => $request->presentation,
            'papers_score' => $request->papers_score,
        ], $payloadData);
        return response()->json($createNewScholarshipSubmissions);
    }

    public function show($id)
    {
        $findSubmissions = $this->scholarshipSubmissionsModel->find($id);
        return response()->json($findSubmissions);
    }

    public function update($id, Request $request)
    {
        $findSubmissions = $this->scholarshipSubmissionsModel->find($id);
        $findSubmissions->update([
            // 'student_id' => $request->student_id,
            // 'period_id' => $request->period_id,
            // 'submit_form' => $request->submit_form,
            // 'brs' => $request->brs,
            // 'raport' => $request->raport,
            // 'cv' => $request->cv,
            // 'papers' => $request->papers,
            // 'other_requirements' => $request->other_requirements,
            // 'presentation' => $request->presentation,
            // 'papar_score' => $request->papar_score,
        ]);
        return response()->json($findSubmissions);
    }

    public function destroy($id)
    {
        $findSubmissions = $this->scholarshipSubmissionsModel->find($id);
        $findSubmissions->delete();
        return response()->json($findSubmissions);
    }
}
