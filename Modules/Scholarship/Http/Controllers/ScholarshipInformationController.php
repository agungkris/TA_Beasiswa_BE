<?php

namespace Modules\Scholarship\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Scholarship\Entities\ScholarshipInformation;

class ScholarshipInformationController extends Controller
{
    private $scholarshipInformationModel;
    public function __construct()
    {
        $this->scholarshipInformationModel = new ScholarshipInformation();
    }


    public function index()
    {
        $getAllScholarshipInformation = $this->scholarshipInformationModel->get(); // select * from ScholarshipInformations;
        // select * from student_groups inner join period on periode.id = student_groups.period_id;
        return response()->json($getAllScholarshipInformation);
    }

    public function store(Request $request)
    {
        $createNewScholarshipInformation = $this->scholarshipInformationModel->create([
            'scholarship_form' => $request->scholarship_form,
            'scholarship_terms_condition' => $request->scholarship_terms_condition
        ]);
        return response()->json($createNewScholarshipInformation);
    }

    public function show($id)
    {
        $findScholarshipInformation = $this->scholarshipInformationModel->find($id);
        return response()->json($findScholarshipInformation);
    }

    public function update($id, Request $request)
    {
        $findScholarshipInformation = $this->scholarshipInformationModel->find($id);
        $findScholarshipInformation->update([
            'scholarship_form' => $request->scholarship_form,
            'scholarship_terms_condition' => $request->scholarship_terms_condition
        ]);
        return response()->json($findScholarshipInformation);
    }

    public function destroy($id)
    {
        $findScholarshipInformation = $this->scholarshipInformationModel->find($id);
        $findScholarshipInformation->delete();
        return response()->json($findScholarshipInformation);
    }
}
