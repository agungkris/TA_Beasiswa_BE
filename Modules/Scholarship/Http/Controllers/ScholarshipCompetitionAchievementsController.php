<?php

namespace Modules\Scholarship\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Scholarship\Entities\ScholarshipCompetitionAchievements;
use Illuminate\Support\Facades\Storage;
use Modules\Scholarship\Transformers\ScholarshipCompetitionAchievementResource;

class ScholarshipCompetitionAchievementsController extends Controller
{
    private $competitionModel;
    public function __construct()
    {
        $this->competitionModel = new ScholarshipCompetitionAchievements();
    }

    public function index(Request $request)
    {
        $getAllCompetition = $this->competitionModel->with('semester', 'student');
        if ($request->student_id) {
            $getAllCompetition = $getAllCompetition->where('student_id', $request->student_id);
        }
        $getAllCompetition = $getAllCompetition->get();
        return ScholarshipCompetitionAchievementResource::collection($getAllCompetition);
    }

    public function store(Request $request)
    {
        $payloadData = [
            'semester_id' => $request->semester_id,
            'student_id' => auth()->id(),
            'activity' => $request->activity,
            'level' => $request->level,
            'realization' => $request->realization,
            'result' => $request->result,
        ];

        if ($request->file('document')) {
            $uploadForm = $request->file('document')->storeAs('document', $request->file('document')->getClientOriginalName());
            $payloadData['document'] = $uploadForm;
        }
        $createNewCompetition = $this->competitionModel->updateOrCreate([
            'semester_id' => $request->semester_id,
            'student_id' => auth()->id(),
            'activity' => $request->activity,
            'level' => $request->level,
            'realization' => $request->realization,
            'result' => $request->result,
        ], $payloadData);
        return response()->json($createNewCompetition);

        // $createNewCompetition = $this->competitionModel->create([
        //     'semester_id' => $request->semester_id,
        //     'student_id' => $request->student_id,
        //     'activity' => $request->activity,
        //     'level' => $request->level,
        //     'realization' => $request->realization,
        //     'result' => $request->result,
        //     'document' => $request->document,
        // ]);
        // return response()->json($createNewCompetition);
    }

    public function show($id)
    {
        $findCompetition = $this->competitionModel->find($id);
        return response()->json($findCompetition);
    }

    public function update($id, Request $request)
    {
        $findCompetition = $this->competitionModel->find($id);
        $payloadData = [
            'semester_id' => $request->semester_id,
            'student_id' => auth()->id(),
            'activity' => $request->activity,
            'level' => $request->level,
            'realization' => $request->realization,
            'result' => $request->result,
        ];
        if ($request->file('document')) {
            if ($findCompetition && Storage::exists($findCompetition->file)) {
                Storage::delete($findCompetition->file);
            }
            $uploadForm = $request->file('document')->storeAs(
                'document',
                $request->file('document')->getClientOriginalName()
            );
            $payloadData['document'] = $uploadForm;
        }
        $findCompetition->update($payloadData);
        return response()->json($findCompetition);

        // $findCompetition = $this->competitionModel->find($id);
        // $findCompetition->update([
        //     'semester_id' => $request->semester_id,
        //     'student_id' => $request->student_id,
        //     'activity' => $request->activity,
        //     'level' => $request->level,
        //     'realization' => $request->realization,
        //     'result' => $request->result,
        //     'document' => $request->document,
        // ]);
        // return response()->json($findCompetition);
    }

    public function destroy($id)
    {
        $findCompetition = $this->competitionModel->find($id);
        $findCompetition->delete();
        return response()->json($findCompetition);
    }
}
