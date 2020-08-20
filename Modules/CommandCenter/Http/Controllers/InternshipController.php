<?php

namespace Modules\CommandCenter\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\CommandCenter\Entities\Internship;

class InternshipController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    private $internshipModel;
    public function __construct()
    {
        $this->internshipModel = new Internship();
    }

    public function index()
    {
        $getAllInternship = $this->internshipModel->with(['generation','internship_scheme'])->get()->map(function ($value) {
            $data = [
                'id' => $value->id,
                'generation_id' => $value->generation_id,
                'internship_scheme_id' => $value->internship_scheme_id,
                'location' => $value->location,
                'output' => $value->output,
                'student_name' => $value->student_name
            ];
            return $data;
        }); // select * from periods;
        return response()->json($getAllInternship);
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
            'internship_scheme_id' => $request->internship_scheme_id,
            'location' => $request->location,
            'output' => $request->output,
            'student_name' => $request->student_name,
        ];
        $createNewInternship = $this->internshipModel->create($payloadData);
        return response()->json($createNewInternship);
    
        
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $findInternship = $this->internshipModel->find($id);
        return response()->json($findInternship);
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
        $findInternship = $this->internshipModel->find($id);
        $findInternship->update([
            'generation_id' => $request->generation_id,
            'internship_scheme_id' => $request->internship_scheme_id,
            'location' => $request->location,
            'output' => $request->output,
            'student_name' => $request->student_name,
        ]);
        return response()->json($findInternship);
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
