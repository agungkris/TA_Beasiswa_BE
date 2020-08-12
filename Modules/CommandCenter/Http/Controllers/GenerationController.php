<?php

namespace Modules\CommandCenter\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\CommandCenter\Entities\Generation;

class GenerationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    private $generationModel;
    public function __construct()
    {
        $this->generationModel = new Generation();
    }

    public function index()
    {
        $getAllGeneration = $this->generationModel->get(); // select * from periods;
        return response()->json($getAllGeneration);
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
        $createNewGeneration = $this->generationModel->create([
            'generation_name' => $request->generation_name,
        ]);
        return response()->json($createNewGeneration);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $findGeneration = $this->generationModel->find($id);
        return response()->json($findGeneration);
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
        $findGeneration = $this->generationModel->find($id);
        $findGeneration->update([
            'generation_name' => $request->generation_name,
        ]);
        return response()->json($findGeneration);
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
