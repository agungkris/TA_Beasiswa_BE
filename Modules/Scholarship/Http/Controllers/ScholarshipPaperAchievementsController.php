<?php

namespace Modules\Scholarship\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Scholarship\Entities\ScholarshipPaperAchievements;
use Illuminate\Support\Facades\Storage;
use Modules\Scholarship\Transformers\ScholarshipPaperAchievementResource;

class ScholarshipPaperAchievementsController extends Controller
{
    private $paperModel;
    public function __construct()
    {
        $this->paperModel = new ScholarshipPaperAchievements();
    }

    public function index()
    {
        $getAllPaper = $this->paperModel->with('semester','student');
        $getAllPaper = $getAllPaper->get();
        return ScholarshipPaperAchievementResource::collection($getAllPaper);
    }

    public function store(Request $request)
    {
        $payloadData = [
            'semester_id' => $request->semester_id,
            'student_id' => auth()->id(),
            'title' => $request->title,
        ];

        if ($request->file('document')) {
            $uploadForm = $request->file('document')->storeAs('document', $request->file('document')->getClientOriginalName());
            $payloadData['document'] = $uploadForm;
        }
        $createNewPaper = $this->paperModel->updateOrCreate([
            'semester_id' => $request->semester_id,
            'student_id' => auth()->id(),
            'title' => $request->title,
        ], $payloadData);
        return response()->json($createNewPaper);

        // $createNewPaper = $this->paperModel->create([
        //     'semester_id' => $request->semester_id,
        //     'student_id' => $request->student_id,
        //     'title' => $request->title,
        //     'document' => $request->document,
        // ]);
        // return response()->json($createNewPaper);
    }

    public function show($id)
    {
        $findPaper = $this->paperModel->find($id);
        return response()->json($findPaper);
    }

    public function update($id, Request $request)
    {
        $findPaper = $this->paperModel->find($id);
        $payloadData = [
            'semester_id' => $request->semester_id,
            'student_id' => auth()->id(),
            'title' => $request->title,
        ];
        if ($request->file('document')) {
            if ($findPaper && Storage::exists($findPaper->file)) {
                Storage::delete($findPaper->file);
            }
            $uploadForm = $request->file('document')->storeAs(
                'document',
                $request->file('document')->getClientOriginalName()
            );
            $payloadData['document'] = $uploadForm;
        }
        $findPaper->update($payloadData);
        return response()->json($findPaper);

        // $findPaper = $this->paperModel->find($id);
        // $findPaper->update([
        //     'semester_id' => $request->semester_id,
        //     'student_id' => $request->student_id,
        //     'title' => $request->title,
        //     'document' => $request->document,
        // ]);
        // return response()->json($findPaper);
    }

    public function destroy($id)
    {
        $findPaper = $this->paperModel->find($id);
        $findPaper->delete();
        return response()->json($findPaper);
    }
}
