<?php

namespace Modules\CommandCenter\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Modules\CommandCenter\Entities\Creation;

class CreationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    private $creationModel;
    public function __construct()
    {
        $this->creationModel = new Creation();
    }

    public function index()
    {
        $getAllCreation = $this->creationModel->with(['creation_category','periods','scope_category'])->get()->map(function ($value) {
            $data = [
                'id' => $value->id,
                'creation_category_id' => $value->creation_category_id,
                'periods_id' => $value->periods_id,
                'scope_category_id' => $value->scope_category_id,
                'creation_file' => asset('upload/' . $value->creation_file),
                'creation_name' => $value->creation_name,
                'description' => $value->description,
                'creation_category' => $value->creation_category,
                'periods' => $value->periods,
                'scope_category' => $value->scope_category
            ];
            return $data;
        }); // select * from periods;
        return response()->json($getAllCreation);
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
            'creation_category_id' => $request->creation_category_id,
            'periods_id' => $request->periods_id,
            'scope_category_id' => $request->scope_category_id,
            'creation_name' => $request->creation_name,
            'description' => $request->description,
        ];
        if ($request->file('creation_file')) {
            $uploadForm = $request->file('creation_file')->store('document');
            $payloadData['creation_file'] = $uploadForm;
        }
        $createNewCreation = $this->creationModel->create($payloadData);
        return response()->json($createNewCreation);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $findCreation = $this->creationModel->find($id);
        return response()->json($findCreation);
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
        $findCreation = $this->creationModel->find($id);
        $payloadData = [
            'creation_category_id' => $request->creation_category_id,
            'periods_id' => $request->periods_id,
            'scope_category_id' => $request->scope_category_id,
            'creation_name' => $request->creation_name,
            'description' => $request->description,
        ];
        if($request->file('creation_file')){
            if(Storage::exists($findCreation->creation_file)){
                Storage::delete(($findCreation->creation_file));

                
                
            }
            $uploadForm = $request->file('creation_file')->store('document');
            $payloadData['creation_file'] = $uploadForm;

        }
        $findCreation->update($payloadData);
        return response()->json($findCreation);
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
