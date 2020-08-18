<?php

namespace Modules\CommandCenter\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
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
        $getAllCommunityDedicationPublication = $this->communitydedicationpublicationModel->with('publication_category','periods','scope_category')->get(); // select * from periods;
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
        $createNewCommunityDedicationPublication = $this->communitydedicationpublicationModel->create([
            'publication_category_id' => $request->publication_category_id,
            'periods_id' => $request->periods_id,
            'scope_category_id' => $request->scope_category_id,
            'publication_file' => $request->publication_file,
            'description' => $request->description,
        ]);
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
        $findCommunityDedicationPublication->update([
            'publication_category_id' => $request->publication_category_id,
            'periods_id' => $request->periods_id,
            'scope_category_id' => $request->scope_category_id,
            'publication_file' => $request->publication_file,
            'description' => $request->description,
        ]);
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
