<?php

namespace Modules\CommandCenter\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
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
        $getAllAchievement = $this->achievementModel->with(['achievement_category','periods','scope_category'])->get()->map(function ($value) {
            $data = [
                'id' => $value->id,
                'achievement_category_id' => $value->achievement_category_id,
                'periods_id' => $value->periods_id,
                'scope_category_id' => $value->scope_category_id,
                'achievement_file' => asset('upload/' . $value->achievement_file),
                'achievement_name' => $value->achievement_name,
                'description' => $value->description,
                'achievement_category' => $value->achievement_category,
                'periods' => $value->periods,
                'scope_category' => $value->scope_category
            ];
            return $data;
        }); // select * from periods;
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
        $payloadData = [
            'achievement_category_id' => $request->achievement_category_id,
            'periods_id' => $request->periods_id,
            'scope_category_id' => $request->scope_category_id,
            'achievement_name' => $request->achievement_name,
            'description' => $request->description,
        ];
        if ($request->file('achievement_file')) {
            $uploadForm = $request->file('achievement_file')->store('document');
            $payloadData['achievement_file'] = $uploadForm;
        }
        $createNewAchievement = $this->achievementModel->create($payloadData);
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
        $payloadData = [
            'achievement_category_id' => $request->achievement_category_id,
            'periods_id' => $request->periods_id,
            'scope_category_id' => $request->scope_category_id,
            'achievement_name' => $request->achievement_name,
            'description' => $request->description,
        ];
        if($request->file('achievement_file')){
            if(Storage::exists($findAchievement->achievement_file)){
                Storage::delete(($findAchievement->achievement_file));

                
                
            }
            $uploadForm = $request->file('publication_file')->store('document');
            $payloadData['publication_file'] = $uploadForm;

        }
        $findAchievement->update($payloadData);
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
