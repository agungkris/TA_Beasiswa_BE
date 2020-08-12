<?php

namespace Modules\CommandCenter\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\CommandCenter\Entities\AchievementCategory;

class AchievementCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */

    private $achievementcategoryModel;
    public function __construct()
    {
        $this->achievementcategoryModel = new AchievementCategory();
    }

    public function index()
    {
        $getAllAchievementCategory = $this->achievementcategoryModel->get(); // select * from periods;
        return response()->json($getAllAchievementCategory);
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
        $createNewAchievementCategory = $this->achievementcategoryModel->create([
            'achievement_category_name' => $request->achievement_category_name,
        ]);
        return response()->json($createNewAchievementCategory);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $findAchievementCategory = $this->achievementcategoryModel->find($id);
        return response()->json($findAchievementCategory);
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
        $findAchievementCategory = $this->achievementcategoryModel->find($id);
        $findAchievementCategory->update([
            'achievement_category_name' => $request->achievement_category_name,
        ]);
        return response()->json($findAchievementCategory);
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
