<?php

namespace Modules\Scholarship\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Scholarship\Entities\ScholarshipAcademicAchievements;
use Modules\Scholarship\Transformers\ScholarshipAcademicAchievementResource;
use Illuminate\Support\Facades\Storage;
use Modules\Scholarship\Entities\ScholarshipAchievements;

class ScholarshipAcademicAchievementsController extends Controller
{
    private $academicModel;
    public function __construct()
    {
        $this->academicModel = new ScholarshipAcademicAchievements();
    }

    public function index(Request $request)
    {
        $getAllAcademic = $this->academicModel->with('semester', 'student');
        if ($request->student_id) {
            $getAllAcademic = $getAllAcademic->where('student_id', $request->student_id);
        }
        $getAllAcademic = $getAllAcademic->get();
        return ScholarshipAcademicAchievementResource::collection($getAllAcademic);
    }

    public function store(Request $request)
    {
        $payloadData = [
            'semester_id' => $request->semester_id,
            'student_id' => auth()->id(),
            'ip' => $request->ip,
            'sks' => $request->sks,
            'ipk' => $request->ipk,
            'description' => $request->description,
        ];
        // dd($payloadData);

        if ($request->file('khs')) {
            $uploadForm = $request->file('khs')->storeAs('document', $request->file('khs')->getClientOriginalName());
            $payloadData['khs'] = $uploadForm;
        }
        $createNewAcademic = $this->academicModel->updateOrCreate([
            'semester_id' => $request->semester_id,
            'student_id' => auth()->id(),
            'ip' => $request->ip,
            'sks' => $request->sks,
            'ipk' => $request->ipk,
            'description' => $request->description,
        ], $payloadData);
        return response()->json($createNewAcademic);
    }

    public function show($id)
    {
        $findAcademic = $this->academicModel->find($id);
        return response()->json($findAcademic);
    }

    public function update($id, Request $request)
    {
        $findAcademic = $this->academicModel->find($id);
        $payloadData = [
            'semester_id' => $request->semester_id,
            'student_id' => auth()->id(),
            'ip' => $request->ip,
            'sks' => $request->sks,
            'ipk' => $request->ipk,
            'description' => $request->description,
        ];
        if ($request->file('khs')) {
            if ($findAcademic && Storage::exists($findAcademic->file)) {
                Storage::delete($findAcademic->file);
            }
            $uploadForm = $request->file('khs')->storeAs(
                'document',
                $request->file('khs')->getClientOriginalName()
            );
            $payloadData['khs'] = $uploadForm;
        }
        $findAcademic->update($payloadData);

        return response()->json($findAcademic);
    }

    public function destroy($id)
    {
        $findAcademic = $this->academicModel->find($id);
        $findAcademic->delete();
        return response()->json($findAcademic);
    }
}
