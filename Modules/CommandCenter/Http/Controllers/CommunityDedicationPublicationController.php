<?php

namespace Modules\CommandCenter\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Modules\CommandCenter\Entities\CommunityDedicationPublication;

class CommunityDedicationPublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    private $communitydedicationpublicationModel;
    public function __construct()
    {
        $this->communitydedicationpublicationModel = new CommunityDedicationPublication();
    }

    public function index()
    {
        $getAllCommunityDedicationPublication = $this->communitydedicationpublicationModel->with(['publication_category','periods','scope_category'])->get()->map(function ($value) {
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
        return response()->json($getAllCommunityDedicationPublication);
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
        $createNewCommunityDedicationPublication = $this->communitydedicationpublicationModel->create($payloadData);
        return response()->json($createNewCommunityDedicationPublication);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $findCommunityDedicationPublication = $this->communitydedicationpublicationModel->find($id);
        return response()->json($findCommunityDedicationPublication);
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
        $findCommunityDedicationPublication = $this->communitydedicationpublicationModel->find($id);
        $payloadData = [
            'publication_category_id' => $request->publication_category_id,
            'periods_id' => $request->periods_id,
            'scope_category_id' => $request->scope_category_id,
            'description' => $request->description,
        ];
        if($request->file('publication_file')){
            if(Storage::exists($findCommunityDedicationPublication->publication_file)){
                Storage::delete(($findCommunityDedicationPublication->publication_file));

                
                
            }
            $uploadForm = $request->file('publication_file')->store('document');
            $payloadData['publication_file'] = $uploadForm;

        }
        $findCommunityDedicationPublication->update($payloadData);
        return response()->json($findCommunityDedicationPublication);
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
