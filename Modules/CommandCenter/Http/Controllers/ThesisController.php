<?php

namespace Modules\CommandCenter\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\CommandCenter\Entities\Thesis;
use SebastianBergmann\Environment\Console;

class ThesisController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    private $thesisModel;
    public function __construct()
    {
        $this->thesisModel = new Thesis();
    }

    public function index()
    {
        $getAllThesis = $this->thesisModel->with(['generation','specialization','specialization_topic'])->get()->map(function ($value) {
            $data = [
                'id' => $value->id,
                'generation_id' => $value->generation_id,
                'specialization_id' => $value->specialization_id,
                'specialization_topic_id' => $value->specialization_topic_id,
                'output' => $value->output,
                'student_name' => $value->student_name,
                'generation' => $value->generation,
                'specialization' => $value->specialization,
                'specialization_topic' => $value->specialization_topic
            ];
            return $data;
        }); // select * from periods;
        return response()->json($getAllThesis);
        
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
            'generation_id' => $request->generation_id,
            'specialization_id' => $request->specialization_id,
            'specialization_topic_id' => $request->specialization_topic_id,
            'output' => $request->output,
            'student_name' => $request->student_name,
        ];
        $createNewThesis = $this->thesisModel->create($payloadData);
        return response()->json($createNewThesis);

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $findThesis = $this->thesisModel->find($id);
        return response()->json($findThesis);
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
        $findThesis = $this->thesisModel->find($id);
        $findThesis->update([
            'generation_id' => $request->generation_id,
            'specialization_id' => $request->specialization_id,
            'specialization_topic_id' => $request->specialization_topic_id,
            'output' => $request->output,
            'student_name' => $request->student_name,
        ]);
        return response()->json($findThesis);
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
