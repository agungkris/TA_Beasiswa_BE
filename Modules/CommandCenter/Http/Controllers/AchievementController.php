<?php

namespace Modules\CommandCenter\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\CommandCenter\Entities\Achievement;

class AchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    private $achievementModel;
    public function __construct()
    {
        $this->achievementModel = new Achievement();
    }

    public function index()
    {
        $getAllAchievement = $this->achievementModel->with('achievement_category','periods','scope_category')->get(); // select * from periods;
        return response()->json($getAllAchievement);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $createNewAchievement = $this->achievementModel->create([
            'achievement_category_id' => $request->achievement_category_id,
            'periods_id' => $request->periods_id,
            'scope_category_id' => $request->scope_category_id,
            'achievement_name' => $request->achievement_name,
            'description' => $request->description,
            'achievement_file' => $request->achievement_file,
        ]);
        return response()->json($createNewAchievement);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $findAchievement = $this->achievementModel->find($id);
        return response()->json($findAchievement);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('commandcenter::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update($id, Request $request)
    {
        $findAchievement = $this->achievementModel->find($id);
        $findAchievement->update([
            'collaboration_scope_id' => $request->collaboration_scope_id,
            'collaboration_periods_id' => $request->collaboration_periods_id,
            'evaluation_periods_id' => $request->evaluation_periods_id,
            'mou_file' => $request->mou_file,
            'moa_file' => $request->moa_file,
            'supporting_file' => $request->supporting_file,
        ]);
        return response()->json($findAchievement);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
