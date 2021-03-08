<?php

namespace Modules\Scholarship\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Scholarship\Entities\ScholarshipAchievements;

class ScholarshipAchievementsController extends Controller
{
    private $achievementModel;
    public function __construct()
    {
        $this->achievementModel = new ScholarshipAchievements();
    }

    public function index(Request $request)
    {
        $getAllAchievement = $this->achievementModel->with('student')->get();

        return response()->json($getAllAchievement);
    }

    public function store(Request $request)
    {
        $createNewAchievement = $this->achievementModel->updateOrCreate([
            'student_id' => $request->student_id,
        ]);
        return response()->json($createNewAchievement);
    }

    public function show($id)
    {
        $findAchievement = $this->achievementModel->find($id);
        return response()->json($findAchievement);
    }

    public function update($id, Request $request)
    {
        $findAchievement = $this->achievementModel->find($id);
        $findAchievement->update([
            'student_id' => $request->student_id,
        ]);
        return response()->json($findAchievement);
    }

    public function destroy($id)
    {
        $findAchievement = $this->achievementModel->find($id);
        $findAchievement->delete();
        return response()->json($findAchievement);
    }
}
