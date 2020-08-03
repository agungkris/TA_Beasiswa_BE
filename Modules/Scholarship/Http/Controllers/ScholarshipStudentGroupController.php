<?php

namespace Modules\Scholarship\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Scholarship\Entities\ScholarshipStudentGroup;

class ScholarshipStudentGroupController extends Controller
{
    private $scholarshipStudentGroupModel;
    public function __construct()
    {
        $this->scholarshipStudentGroupModel = new ScholarshipStudentGroup();
    }


    public function index()
    {
        $getAllStudentGroup = $this->scholarshipStudentGroupModel->with('period')->get(); // select * from studentGroups;
        // select * from student_groups inner join period on periode.id = student_groups.period_id;
        return response()->json($getAllStudentGroup);
    }

    public function store(Request $request)
    {
        $createNewStudentGroup = $this->scholarshipStudentGroupModel->create([
            'period_id' => $request->period_id,
            'group_name' => $request->group_name,
            'topic' => $request->description
        ]);
        return response()->json($createNewStudentGroup);
    }

    public function show($id)
    {
        $findStudentGroup = $this->scholarshipStudentGroupModel->find($id);
        return response()->json($findStudentGroup);
    }

    public function update($id, Request $request)
    {
        $findStudentGroup = $this->scholarshipStudentGroupModel->find($id);
        $findStudentGroup->update([
            'period_id' => $request->period_id,
            'group_name' => $request->group_name,
            'topic' => $request->description
        ]);
        return response()->json($findStudentGroup);
    }

    public function destroy($id)
    {
        $findStudentGroup = $this->scholarshipStudentGroupModel->find($id);
        $findStudentGroup->delete();
        return response()->json($findStudentGroup);
    }
}
