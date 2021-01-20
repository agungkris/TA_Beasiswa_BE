<?php

namespace Modules\Scholarship\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Scholarship\Entities\ScholarshipLevelAchievements;

class ScholarshipLevelAchievementsController extends Controller
{
    private $levelModel;
    public function __construct()
    {
        $this->levelModel = new ScholarshipLevelAchievements();
    }


    public function index()
    {
        $getAllLevel = $this->levelModel->get(); // select * from levels;
        return response()->json($getAllLevel);
    }

    public function store(Request $request)
    {
        $createNewLevel = $this->levelModel->create([
            'level' => $request->level,
        ]);
        return response()->json($createNewLevel);
    }

    public function show($id)
    {
        $findLevel = $this->levelModel->find($id);
        return response()->json($findLevel);
    }

    public function update($id, Request $request)
    {
        $findLevel = $this->levelModel->find($id);
        $findLevel->update([
            'level' => $request->level,
        ]);
        return response()->json($findLevel);
    }

    public function destroy($id)
    {
        $findLevel = $this->levelModel->find($id);
        $findLevel->delete();
        return response()->json($findLevel);
    }
}
