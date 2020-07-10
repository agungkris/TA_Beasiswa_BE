<?php

namespace App\Http\Controllers;

use App\StudentGroup;
use Illuminate\Http\Request;

class StudentGroupController extends Controller
{
    private $studentGroupModel;
    public function __construct()
    {
        $this->studentGroupModel = new StudentGroup();
    }


    public function index(){
        $getAllstudentGroupe = $this->studentGroupModel->with('period')->get(); // select * from studentGroups;
        // select * from student_groups inner join period on periode.id = student_groups.period_id;
        return response()->json($getAllstudentGroupe);
    }

    public function store(Request $request){
        $createNewstudentGroup = $this->studentGroupModel->create([
            'period_id' => $request->period_id,
            'group_name' => $request->group_name,
            'topic' => $request->description
        ]);
        return response()->json($createNewstudentGroup);
    }

    public function show($id){
        $findstudentGroup = $this->studentGroupModel->find($id);
        return response()->json($findstudentGroup);
    }

    public function update($id,Request $request){
        $findstudentGroup = $this->studentGroupModel->find($id);
        $findstudentGroup->update([
            'period_id' => $request->period_id,
            'group_name' => $request->group_name,
            'topic' => $request->description
        ]);
        return response()->json($findstudentGroup);
    }

    public function destroy($id){
        $findstudentGroup = $this->studentGroupModel->find($id);
        $findstudentGroup->delete();
        return response()->json($findstudentGroup);
    }
}
