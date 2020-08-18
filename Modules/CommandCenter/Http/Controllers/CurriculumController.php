<?php

namespace Modules\CommandCenter\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\CommandCenter\Entities\Curriculum;

class CurriculumController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    private $curriculumModel;
    public function __construct()
    {
        $this->curriculumModel = new Curriculum();
    }

    public function index()
    {
        $getAllCurriculum = $this->curriculumModel->with('periods','specialization')->get(); // select * from periods;
        return response()->json($getAllCurriculum);
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
        $createNewCurriculum = $this->curriculumModel->create([
            'periods_id' => $request->periods_id,
            'specialization_id' => $request->specialization_id,
            'curriculum_file' => $request->curriculum_file,
            'description' => $request->description,
        ]);
        return response()->json($createNewCurriculum);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $findCurriculum = $this->curriculumModel->find($id);
        return response()->json($findCurriculum);
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
        $findCurriculum = $this->curriculumModel->find($id);
        $findCurriculum->update([
            'periods_id' => $request->periods_id,
            'specialization_id' => $request->specialization_id,
            'curriculum_file' => $request->curriculum_file,
            'description' => $request->description,
        ]);
        return response()->json($findCurriculum);
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
