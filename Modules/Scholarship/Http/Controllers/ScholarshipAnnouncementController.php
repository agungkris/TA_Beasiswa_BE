<?php

namespace Modules\Scholarship\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Scholarship\Entities\ScholarshipAnnouncement;
use Modules\Scholarship\Transformers\ScholarshipAnnouncementResource;
use Illuminate\Support\Facades\Storage;

class ScholarshipAnnouncementController extends Controller
{
    private $scholarshipAnnouncementModel;
    public function __construct()
    {
        $this->scholarshipAnnouncementModel = new ScholarshipAnnouncement();
    }


    public function index(Request $request)
    {
        $getAllScholarshipAnnouncement = $this->scholarshipAnnouncementModel->with('period'); // select * from scholarshipannouncements;

        if ($request->filled('period_id')) {
            $getAllScholarshipAnnouncement = $getAllScholarshipAnnouncement->where('period_id', $request->period_id);
        }
        $getAllScholarshipAnnouncement = $getAllScholarshipAnnouncement->get();

        return ScholarshipAnnouncementResource::collection($getAllScholarshipAnnouncement);
    }

    public function store(Request $request)
    {
        $payloadData = [
            'period_id' => $request->period_id,
            'title' => $request->title,
            'description' => $request->description,
        ];

        if ($request->file('document')) {
            $uploadForm = $request->file('document')->storeAs('document', $request->file('document')->getClientOriginalName());
            $payloadData['document'] = $uploadForm;
        }
        $createNewScholarshipAnnouncement = $this->scholarshipAnnouncementModel->updateOrCreate([
            'period_id' => $request->period_id,
            'title' => $request->title,
            'description' => $request->description,

        ], $payloadData);
        return response()->json($createNewScholarshipAnnouncement);
    }

    public function show($id)
    {
        $findScholarshipAnnouncement = $this->scholarshipAnnouncementModel->find($id);
        return response()->json($findScholarshipAnnouncement);
    }

    public function update($id, Request $request)
    {
        // $payloadData = [
        //     'period_id' => $request->period_id,
        //     'title' => $request->title,
        //     'description' => $request->description,
        // ];
        // if ($request->file('document')) {
        //     // if (Storage::exists($findSubmissions->document)) {
        //     //     Storage::delete($findSubmissions->document);
        //     // }
        //     $uploadForm = $request->file('document')->store('document');
        //     $payloadData['document'] = $uploadForm;
        // }
        $findScholarshipAnnouncement = $this->scholarshipAnnouncementModel->find($id);
        $payloadData = [
            'period_id' => $request->period_id,
            'title' => $request->title,
            'description' => $request->description,
            'document' => $request->document
        ];
        if ($request->file('document')) {
            if ($findScholarshipAnnouncement && Storage::exists($findScholarshipAnnouncement->file)) {
                Storage::delete($findScholarshipAnnouncement->file);
            }
            $uploadForm = $request->file('document')->storeAs(
                'document',
                $request->file('document')->getClientOriginalName()
            );
            $payloadData['document'] = $uploadForm;
        }
        $findScholarshipAnnouncement->update($payloadData);

        return response()->json($findScholarshipAnnouncement);
    }

    public function destroy($id)
    {
        $findScholarshipAnnouncement = $this->scholarshipAnnouncementModel->find($id);
        $findScholarshipAnnouncement->delete();
        return response()->json($findScholarshipAnnouncement);
    }
}
