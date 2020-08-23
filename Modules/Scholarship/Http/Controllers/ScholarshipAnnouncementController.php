<?php

namespace Modules\Scholarship\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Scholarship\Entities\ScholarshipAnnouncement;

class ScholarshipAnnouncementController extends Controller
{
    private $scholarshipAnnouncementModel;
    public function __construct()
    {
        $this->scholarshipAnnouncementModel = new ScholarshipAnnouncement();
    }


    public function index()
    {
        $getAllScholarshipAnnouncement = $this->scholarshipAnnouncementModel->get(); // select * from scholarshipannouncements;
        return response()->json($getAllScholarshipAnnouncement);
    }

    public function store(Request $request)
    {
        $payloadData = [
            'title' => $request->title,
            'description' => $request->description,
        ];
        if ($request->file('document')) {
            // if (Storage::exists($findSubmissions->document)) {
            //     Storage::delete($findSubmissions->document);
            // }
            $uploadForm = $request->file('document')->store('document');
            $payloadData['document'] = $uploadForm;
        }
        $createNewScholarshipAnnouncement = $this->scholarshipAnnouncementModel->updateOrCreate([
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
        $findScholarshipAnnouncement = $this->scholarshipAnnouncementModel->find($id);
        $findScholarshipAnnouncement->update([
            // 'jury_id' => $request->jury_id,
            // 'karya_tulis' => $request->karya_tulis,
            // 'fgd' => $request->fgd,
        ]);
        return response()->json($findScholarshipAnnouncement);
    }

    public function destroy($id)
    {
        $findScholarshipAnnouncement = $this->scholarshipAnnouncementModel->find($id);
        $findScholarshipAnnouncement->delete();
        return response()->json($findScholarshipAnnouncement);
    }
}
