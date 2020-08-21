<?php

namespace Modules\CommandCenter\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Modules\CommandCenter\Entities\ResearchGrant;

class ResearchGrantController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    private $researchgrantModel;
    public function __construct()
    {
        $this->researchgrantModel = new ResearchGrant();
    }

    public function index()
    {
        $getAllResearchGrant = $this->researchgrantModel->with(['periods','scope_category'])->get()->map(function ($value) {
            $data = [
                'id' => $value->id,
                'periods_id' => $value->periods_id,
                'scope_category_id' => $value->scope_category_id,
                'grant_file' => asset('upload/' . $value->grant_file),
                'description' => $value->description,
                'periods' => $value->periods,
                'scope_category' => $value->scope_category
            ];
            return $data;
        }); // select * from periods;
        return response()->json($getAllResearchGrant);

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
            'scope_category_id' => $request->scope_category_id,
            'description' => $request->description,
        ];
        if ($request->file('grant_file')) {
            $uploadForm = $request->file('grant_file')->store('document');
            $payloadData['grant_file'] = $uploadForm;
        }
        $createNewResearchGrant = $this->researchgrantModel->create($payloadData);
        return response()->json($createNewResearchGrant);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $findResearchGrant = $this->researchgrantModel->find($id);
        return response()->json($findResearchGrant);
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
        $findResearchGrant = $this->researchgrantModel->find($id);
        $payloadData = [
            'periods_id' => $request->periods_id,
            'scope_category_id' => $request->scope_category_id,
            'description' => $request->description,
        ];
        if($request->file('grant_file')){
            if(Storage::exists($findResearchGrant->grant_file)){
                Storage::delete(($findResearchGrant->grant_file));

                
                
            }
            $uploadForm = $request->file('grant_file')->store('document');
            $payloadData['grant_file'] = $uploadForm;

        }
        $findResearchGrant->update($payloadData);
        return response()->json($findResearchGrant);
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
