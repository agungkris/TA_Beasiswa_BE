<?php

namespace Modules\Scholarship\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Scholarship\Entities\ScholarshipOrganizationAchievements;
use Illuminate\Support\Facades\Storage;
use Modules\Scholarship\Transformers\ScholarshipOrganizationAchievementResource;

class ScholarshipOrganizationAchievementsController extends Controller
{
    private $organizationModel;
    public function __construct()
    {
        $this->organizationModel = new ScholarshipOrganizationAchievements();
    }

    public function index(Request $request)
    {
        $getAllOrganization = $this->organizationModel->with('semester', 'student', 'achievement');
        if ($request->student_id) {
            $getAllOrganization = $getAllOrganization->where('student_id', $request->student_id);
        }
        $getAllOrganization = $getAllOrganization->get();
        return ScholarshipOrganizationAchievementResource::collection($getAllOrganization);
    }

    public function store(Request $request)
    {
        $payloadData = [
            'achievement_id' => $request->achievement_id,
            'semester_id' => $request->semester_id,
            'student_id' => auth()->id(),
            'name' => $request->name,
            'period' => $request->period,
            'position' => $request->position,
        ];

        if ($request->file('document')) {
            $uploadForm = $request->file('document')->storeAs('document', $request->file('document')->getClientOriginalName());
            $payloadData['document'] = $uploadForm;
        }
        $createNewOrganization = $this->organizationModel->updateOrCreate([
            'achievement_id' => $request->achievement_id,
            'semester_id' => $request->semester_id,
            'student_id' => auth()->id(),
            'name' => $request->name,
            'period' => $request->period,
            'position' => $request->position,
        ], $payloadData);
        return response()->json($createNewOrganization);

        // $createNewOrganization = $this->organizationModel->create([
        //     'semester_id' => $request->semester_id,
        //     'student_id' => $request->student_id,
        //     'name' => $request->name,
        //     'period' => $request->period,
        //     'position' => $request->position,
        //     'document' => $request->document,
        // ]);
        // return response()->json($createNewOrganization);
    }

    public function show($id)
    {
        $findOrganization = $this->organizationModel->find($id);
        return response()->json($findOrganization);
    }

    public function update($id, Request $request)
    {
        $findOrganization = $this->organizationModel->find($id);
        $payloadData = [
            'achievement_id' => $request->achievement_id,
            'semester_id' => $request->semester_id,
            'student_id' => auth()->id(),
            'name' => $request->name,
            'period' => $request->period,
            'position' => $request->position,
        ];
        if ($request->file('document')) {
            if ($findOrganization && Storage::exists($findOrganization->file)) {
                Storage::delete($findOrganization->file);
            }
            $uploadForm = $request->file('document')->storeAs(
                'document',
                $request->file('document')->getClientOriginalName()
            );
            $payloadData['document'] = $uploadForm;
        }
        $findOrganization->update($payloadData);
        return response()->json($findOrganization);

        // $findOrganization = $this->organizationModel->find($id);
        // $findOrganization->update([
        //     'semester_id' => $request->semester_id,
        //     'student_id' => $request->student_id,
        //     'name' => $request->name,
        //     'period' => $request->period,
        //     'position' => $request->position,
        //     'document' => $request->document,
        // ]);
        // return response()->json($findOrganization);
    }

    public function destroy($id)
    {
        $findOrganization = $this->organizationModel->find($id);
        $findOrganization->delete();
        return response()->json($findOrganization);
    }
}
