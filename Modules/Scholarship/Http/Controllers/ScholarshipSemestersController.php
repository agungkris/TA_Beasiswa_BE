<?php

namespace Modules\Scholarship\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Scholarship\Entities\ScholarshipSemesters;

class ScholarshipSemestersController extends Controller
{
    private $semesterModel;
    public function __construct()
    {
        $this->semesterModel = new ScholarshipSemesters();
    }

    public function index()
    {
        $getAllSemester = $this->semesterModel->get();
        return response()->json($getAllSemester);
    }

    public function store(Request $request)
    {
        $createNewSemester = $this->semesterModel->create([
            'semester' => $request->semester,
        ]);
        return response()->json($createNewSemester);
    }

    public function show($id)
    {
        $findSemester = $this->semesterModel->find($id);
        return response()->json($findSemester);
    }

    public function update($id, Request $request)
    {
        $findSemester = $this->semesterModel->find($id);
        $findSemester->update([
            'semester' => $request->semester,
        ]);
        return response()->json($findSemester);
    }

    public function destroy($id)
    {
        $findSemester = $this->semesterModel->find($id);
        $findSemester->delete();
        return response()->json($findSemester);
    }
}
