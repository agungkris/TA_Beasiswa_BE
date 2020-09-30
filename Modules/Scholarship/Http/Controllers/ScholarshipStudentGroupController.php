<?php

namespace Modules\Scholarship\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Scholarship\Entities\ScholarshipPeriod;
use Modules\Scholarship\Entities\ScholarshipStudentGroup;
use Modules\Scholarship\Entities\ScholarshipSubmissions;

class ScholarshipStudentGroupController extends Controller
{
    private $scholarshipStudentGroupModel, $scholarshipSubmissionModel, $scholarshipPeriod;
    public function __construct()
    {
        $this->scholarshipStudentGroupModel = new ScholarshipStudentGroup();
        $this->scholarshipSubmissionModel = new ScholarshipSubmissions();
        $this->scholarshipPeriod = new ScholarshipPeriod();
    }


    public function index(Request $request)
    {

        $getAllStudentGroup = $this->scholarshipStudentGroupModel->with('period', 'member.profile'); // select * from studentGroups;

        if ($request->filled('period_id')) {
            $getAllStudentGroup = $getAllStudentGroup->where('period_id', $request->period_id);
        }
        $getAllStudentGroup = $getAllStudentGroup->get();

        // select * from student_groups inner join period on periode.id = student_groups.period_id;
        return response()->json($getAllStudentGroup);
    }

    public function randomMember(Request $request)
    {
        $period = $request->period_id ?? $this->scholarshipPeriod->latest()->first()->id;
        $getGroupsByPeriod = $this->scholarshipStudentGroupModel->where('period_id', $period)->get();
        $countGroup = count($getGroupsByPeriod);
        // dd($countGroup);
        $getUserByPeriod = $this->scholarshipSubmissionModel->where('period_id', $period)->where('next_stage', 1)->inRandomOrder()->get();
        $countUser = count($getUserByPeriod);
        // dd($countUser);
        if ($countUser == 0) {
            return response()->json(['message' => 'data tidak ada'], 200);
        }
        $roundUserGroup = round($countUser / $countGroup);
        // dd($countGroup, $countUser, $roundUserGroup, (11 / 3));

        $chunkUser = $getUserByPeriod->chunk($roundUserGroup);

        // ->chunk($countGroup);
        // ->random();
        // dd($getUserByPeriod);



        foreach ($getGroupsByPeriod as $index => $group) {
            // dd($group);
            // dd($chunkUser->toArray());
            $group->member()->detach();
            foreach ($chunkUser[$index] as $groupUser) {
                // dd($groupUser);
                // foreach ($groupUser as $user) {
                $group->member()->attach($groupUser->student_id);
                // }
            }
        }

        return response()->json(['message' => 'berhasil']);
    }

    public function store(Request $request)
    {
        $createNewStudentGroup = $this->scholarshipStudentGroupModel->create([
            'period_id' => $request->period_id,
            'group_name' => $request->group_name,
            'topic' => $request->topic
        ]);
        return response()->json($createNewStudentGroup);
    }

    public function show($id)
    {
        $findStudentGroup = $this->scholarshipStudentGroupModel->with('member')->find($id);
        return response()->json($findStudentGroup);
    }

    public function update($id, Request $request)
    {
        $findStudentGroup = $this->scholarshipStudentGroupModel->find($id);
        $findStudentGroup->update([
            'period_id' => $request->period_id,
            'group_name' => $request->group_name,
            'topic' => $request->topic
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
