<?php

namespace Modules\Scholarship\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
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
        $getAllScholarshipInformation = $this->scholarshipInformationModel->get()->map(function ($value) {
            $data = [
                'id' => $value->id,
                'scholarship_form' => asset('upload/' . $value->scholarship_form),
                'scholarship_term_condition' => asset('upload/' . $value->scholarship_terms_condition),
                'cv_templete' => asset('upload/' . $value->cv_templete),
            ];
            return $data;
        }); // select * from ScholarshipInformations;
        // $findScholarshipInformation = $this->scholarshipInformationModel->first();
        // $data = [
        //     'id' => $findScholarshipInformation->id,
        //     'scholarship_form' => asset('upload/' . $findScholarshipInformation->scholarship_form),
        //     'scholarship_term_condition' => asset('upload/' . $findScholarshipInformation->scholarship_terms_condition),
        //     'cv_templete' => asset('upload/' . $findScholarshipInformation->cv_templete),
        // ];
        // select * from student_groups inner join period on periode.id = student_groups.period_id;
        return response()->json($getAllScholarshipInformation);
    }

    public function show()
    {
        // $getAllScholarshipInformation = $this->scholarshipInformationModel->first()->map(function ($value) {
        //     $data = [
        //         'id' => $value->id,
        //         'scholarship_form' => asset('upload/' . $value->scholarship_form),
        //         'scholarship_term_condition' => asset('upload/' . $value->scholarship_terms_condition),
        //     ];
        //     return $data;
        // }); // select * from ScholarshipInformations;
        $findScholarshipInformation = $this->scholarshipInformationModel->first();
        $data = [
            'id' => $findScholarshipInformation->id,
            'scholarship_form' => asset('upload/' . $findScholarshipInformation->scholarship_form),
            'scholarship_term_condition' => asset('upload/' . $findScholarshipInformation->scholarship_terms_condition),
            'cv_templete' => asset('upload/' . $findScholarshipInformation->cv_templete),
        ];
        // select * from student_groups inner join period on periode.id = student_groups.period_id;
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $payloadData = [
            'id' => 1
        ];
        $findScholarShip = $this->scholarshipInformationModel->first();
        if ($request->file('scholarship_form')) {
            if ($findScholarShip && Storage::exists($findScholarShip->scholarship_form)) {
                Storage::delete($findScholarShip->scholarship_form);
            }
            $uploadForm = $request->file('scholarship_form')->storeAs('document', $request->file('scholarship_form')->getClientOriginalName());
            $payloadData['scholarship_form'] = $uploadForm;
        }

        if ($request->file('scholarship_terms_condition')) {
            if ($findScholarShip && Storage::exists($findScholarShip->scholarship_terms_condition)) {
                Storage::delete($findScholarShip->scholarship_terms_condition);
            }
            $uploadTerm = $request->file('scholarship_terms_condition')->storeAs('document', $request->file('scholarship_terms_condition')->getClientOriginalName());
            $payloadData['scholarship_terms_condition'] = $uploadTerm;
        }

        if ($request->file('cv_templete')) {
            if ($findScholarShip && Storage::exists($findScholarShip->cv_templete)) {
                Storage::delete($findScholarShip->cv_templete);
            }
            $uploadTerm = $request->file('cv_templete')->storeAs('document', $request->file('cv_templete')->getClientOriginalName());
            $payloadData['cv_templete'] = $uploadTerm;
        }

        $createNewScholarshipInformation = $this->scholarshipInformationModel->updateOrCreate([
            'id' => 1,
        ], $payloadData);
        return response()->json($createNewScholarshipInformation);
    }

    // public function show($id)
    // {
    //     $findScholarshipInformation = $this->scholarshipInformationModel->find($id);
    //     return response()->json($findScholarshipInformation);
    // }

    public function update($id, Request $request)
    {
        $findScholarshipInformation = $this->scholarshipInformationModel->find($id);
        $findScholarshipInformation->update([
            'scholarship_form' => $request->scholarship_form,
            'scholarship_terms_condition' => $request->scholarship_terms_condition,
            'cv_templete' => $request->cv_templete
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
