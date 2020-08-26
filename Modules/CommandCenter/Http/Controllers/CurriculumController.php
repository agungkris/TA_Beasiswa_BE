<?php

namespace Modules\CommandCenter\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Modules\CommandCenter\Entities\Curriculum;
use Modules\CommandCenter\Entities\Periods;

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

    public function index(Request $request)
    {   
        
        $getAllCurriculum = $this->curriculumModel->with(['periods','specializations']);
        if($request->filled('period_id')){
            $getAllCurriculum = $getAllCurriculum->where('periods_id',$request->period_id);
        }

        
            
            
        
        $getAllCurriculum = $getAllCurriculum->get()->map(function ($value) {
            $data = [
                'id' => $value->id,
                'periods_id' => $value->periods_id,
                // 'specialization_id' => $value->specialization_id,
                'curriculum_file' => asset('upload/' . $value->curriculum_file),
                'description' => $value->description,
                'periods' => $value->periods,
                'specializations' => $value->specializations
                // 'specialization' => $value->specialization
                
            ];
            return $data;
        }); // select * from periods;
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
        $payloadData = [
            'periods_id' => $request->periods_id,
            // 'specialization_id' => $request->specialization_id,
            'description' => $request->description,
        ];
        if ($request->file('curriculum_file')) {
            // if (Storage::exists($findSubmissions->curriculum_file)) {
            //     Storage::delete($findSubmissions->curriculum_file);
            // }
            $uploadForm = $request->file('curriculum_file')->store('document');
            $payloadData['curriculum_file'] = $uploadForm;
        }
        $createNewCurriculum = $this->curriculumModel->create($payloadData);
        return response()->json($createNewCurriculum);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $findCurriculum = $this->curriculumModel->with('specializations')->find($id);
        // $findCurriculum->specializations = 
        
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
        $payloadData = [
            'periods_id' => $request->periods_id,
            // 'specialization_id' => $request->specialization_id,
            'description' => $request->description,
        ];
        if($request->file('curriculum_file')){
            if(Storage::exists($findCurriculum->curriculum_file)){
                Storage::delete(($findCurriculum->curriculum_file));

                
                
            }
            $uploadForm = $request->file('curriculum_file')->store('document');
            $payloadData['curriculum_file'] = $uploadForm;

        }

        // if($request->filled('specializations')){
        //     $specializationList = $request->specializations;
        //     foreach($specializationList as $data){
        //         $findCurriculum->specializations()->attach($data->id);   
        //     }
        // }

        // $findCurriculum->specialization()->sync();
        
        $findCurriculum->update($payloadData);
        return response()->json($findCurriculum);
    }

    public function addSpecialization($curriculumID,Request $request){
        $findCurriculum = $this->curriculumModel->find($curriculumID);
        $findCurriculum->specializations()->attach($request->id);
        return response()->json(['message' => 'asdasd'],200);

    }

    public function removeSpecialization($curriculumID,$id){
        $findCurriculum = $this->curriculumModel->find($curriculumID);
        $findCurriculum->specializations()->detach($id);
        return response()->json(['message' => 'asdasd'],200);
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
