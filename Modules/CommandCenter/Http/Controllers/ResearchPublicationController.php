<?php

namespace Modules\CommandCenter\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Modules\CommandCenter\Entities\ResearchPublication;

class ResearchPublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    private $researchpublicationModel;
    public function __construct()
    {
        $this->researchpublicationModel = new ResearchPublication();
    }

    public function index()
    {
        $getAllResearchPublication = $this->researchpublicationModel->with(['publication_category','periods','scope_category'])->get()->map(function ($value) {
            $data = [
                'id' => $value->id,
                'publication_category_id' => $value->publication_category_id,
                'periods_id' => $value->periods_id,
                'scope_category_id' => $value->scope_category_id,
                'publication_file' => asset('upload/' . $value->publication_file),
                'description' => $value->description,
                'publication_category' => $value->publication_category,
                'periods' => $value->periods,
                'scope_category' => $value->scope_category
            ];
            return $data;
        }); // select * from periods;
        return response()->json($getAllResearchPublication);
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
            'publication_category_id' => $request->publication_category_id,
            'periods_id' => $request->periods_id,
            'scope_category_id' => $request->scope_category_id,
            'description' => $request->description,
        ];
        if ($request->file('publication_file')) {
            $uploadForm = $request->file('publication_file')->store('document');
            $payloadData['publication_file'] = $uploadForm;
        }
        $createNewResearchPublication = $this->researchpublicationModel->create($payloadData);
        return response()->json($createNewResearchPublication);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $findResearchPublication = $this->researchpublicationModel->find($id);
        return response()->json($findResearchPublication);
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
        $findResearchPublication = $this->researchpublicationModel->find($id);
        $payloadData = [
            'publication_category_id' => $request->publication_category_id,
            'periods_id' => $request->periods_id,
            'scope_category_id' => $request->scope_category_id,
            'description' => $request->description,
        ];
        if($request->file('publication_file')){
            if(Storage::exists($findResearchPublication->publication_file)){
                Storage::delete(($findResearchPublication->publication_file));

                
                
            }
            $uploadForm = $request->file('publication_file')->store('document');
            $payloadData['publication_file'] = $uploadForm;

        }
        $findResearchPublication->update($payloadData);
        return response()->json($findResearchPublication);
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
