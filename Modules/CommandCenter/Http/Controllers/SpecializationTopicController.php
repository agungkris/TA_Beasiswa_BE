<?php

namespace Modules\CommandCenter\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\CommandCenter\Entities\SpecializationTopic;

class SpecializationTopicController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    private $specializationtopicModel;
    public function __construct()
    {
        $this->specializationtopicModel = new SpecializationTopic();
    }

    public function index()
    {
        $getAllSpecializationTopic = $this->specializationtopicModel->get(); // select * from periods;
        return response()->json($getAllSpecializationTopic);
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
        $createNewSpecializationTopic = $this->specializationtopicModel->create([
            'specialization_topic_name' => $request->specialization_topic_name,
        ]);
        return response()->json($createNewSpecializationTopic);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $findSpecializationTopic = $this->specializationtopicModel->find($id);
        return response()->json($findSpecializationTopic);
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
        $findSpecializationTopic = $this->specializationtopicModel->find($id);
        $findSpecializationTopic->update([
            'specialization_topic_name' => $request->specialization_topic_name,
        ]);
        return response()->json($findSpecializationTopic);
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
