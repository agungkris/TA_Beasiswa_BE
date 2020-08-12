<?php

namespace Modules\Scholarship\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Scholarship\Entities\ScholarshipStudentGroupMembers;

class ScholarshipStudentGroupMembersController extends Controller
{
    private $scholarshipStudentGroupMembersModel;
    public function __construct()
    {
        $this->scholarshipStudentGroupMembersModel = new ScholarshipStudentGroupMembers();
    }


    public function index()
    {
        $getAllStudentGroupMembers = $this->scholarshipStudentGroupMembersModel->with('student', 'student_group')->get(); // select * from StudentGroupMemberss;
        // select * from student_groups inner join period on periode.id = student_groups.period_id;
        return response()->json($getAllStudentGroupMembers);
    }

    public function store(Request $request)
    {
        $createNewStudentGroupMembers = $this->scholarshipStudentGroupMembersModel->create([
            'student_id' => $request->student_id,
            'student_group_id' => $request->student_group_id
        ]);
        return response()->json($createNewStudentGroupMembers);
    }

    public function show($id)
    {
        $findStudentGroupMembers = $this->scholarshipStudentGroupMembersModel->find($id);
        return response()->json($findStudentGroupMembers);
    }

    public function update($id, Request $request)
    {
        $findStudentGroupMembers = $this->scholarshipStudentGroupMembersModel->find($id);
        $findStudentGroupMembers->update([
            'student_id' => $request->student_id,
            'student_group_id' => $request->student_group_id
        ]);
        return response()->json($findStudentGroupMembers);
    }

    public function destroy($id)
    {
        $findStudentGroupMembers = $this->scholarshipStudentGroupMembersModel->find($id);
        $findStudentGroupMembers->delete();
        return response()->json($findStudentGroupMembers);
    }
}
