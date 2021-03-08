<?php

namespace Modules\Scholarship\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Scholarship\Entities\ScholarshipEventAchievements;
use Illuminate\Support\Facades\Storage;
use Modules\Scholarship\Transformers\ScholarshipEventAchievementResource;

class ScholarshipEventAchievementsController extends Controller
{
    private $eventModel;
    public function __construct()
    {
        $this->eventModel = new ScholarshipEventAchievements();
    }

    public function index(Request $request)
    {
        $getAllEvent = $this->eventModel->with('semester', 'student', 'achievement');
        if ($request->student_id) {
            $getAllEvent = $getAllEvent->where('student_id', $request->student_id);
        }
        $getAllEvent = $getAllEvent->get();
        return ScholarshipEventAchievementResource::collection($getAllEvent);
    }

    public function store(Request $request)
    {
        $payloadData = [
            'achievement_id' => $request->achievement_id,
            'semester_id' => $request->semester_id,
            'student_id' => auth()->id(),
            'activity' => $request->activity,
            'realization' => $request->realization,
        ];

        if ($request->file('document')) {
            $uploadForm = $request->file('document')->storeAs('document', $request->file('document')->getClientOriginalName());
            $payloadData['document'] = $uploadForm;
        }
        $createNewEvent = $this->eventModel->updateOrCreate([
            'achievement_id' => $request->achievement_id,
            'semester_id' => $request->semester_id,
            'student_id' => auth()->id(),
            'activity' => $request->activity,
            'realization' => $request->realization,
        ], $payloadData);
        return response()->json($createNewEvent);

        // $createNewEvent = $this->eventModel->create([
        //     'semester_id' => $request->semester_id,
        //     'student_id' => $request->student_id,
        //     'activity' => $request->activity,
        //     'realization' => $request->realization,
        //     'document' => $request->document,
        // ]);
        // return response()->json($createNewEvent);
    }

    public function show($id)
    {
        $findEvent = $this->eventModel->find($id);
        return response()->json($findEvent);
    }

    public function update($id, Request $request)
    {
        $findEvent = $this->eventModel->find($id);
        $payloadData = [
            'achievement_id' => $request->achievement_id,
            'semester_id' => $request->semester_id,
            'student_id' => auth()->id(),
            'activity' => $request->activity,
            'realization' => $request->realization,
        ];
        if ($request->file('document')) {
            if ($findEvent && Storage::exists($findEvent->file)) {
                Storage::delete($findEvent->file);
            }
            $uploadForm = $request->file('document')->storeAs(
                'document',
                $request->file('document')->getClientOriginalName()
            );
            $payloadData['document'] = $uploadForm;
        }
        $findEvent->update($payloadData);
        return response()->json($findEvent);

        // $findEvent = $this->eventModel->find($id);
        // $findEvent->update([
        //     'semester_id' => $request->semester_id,
        //     'student_id' => $request->student_id,
        //     'activity' => $request->activity,
        //     'realization' => $request->realization,
        //     'document' => $request->document,
        // ]);
        // return response()->json($findEvent);
    }

    public function destroy($id)
    {
        $findEvent = $this->eventModel->find($id);
        $findEvent->delete();
        return response()->json($findEvent);
    }
}
