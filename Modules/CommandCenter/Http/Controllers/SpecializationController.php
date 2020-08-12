<?php

namespace Modules\CommandCenter\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\CommandCenter\Entities\Specialization;

class SpecializationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    private $specializationModel;
    public function __construct()
    {
        $this->specializationModel = new Specialization();
    }

    public function index()
    {
        $getAllSpecialization = $this->specializationModel->get(); // select * from periods;
        return response()->json($getAllSpecialization);
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
        $createNewSpecialization = $this->specializationModel->create([
            'specialization_name' => $request->specialization_name,
        ]);
        return response()->json($createNewSpecialization);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $findSpecialization = $this->specializationModel->find($id);
        return response()->json($findSpecialization);
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
        $findSpecialization = $this->specializationModel->find($id);
        $findSpecialization->update([
            'specialization_name' => $request->specialization_name,
        ]);
        return response()->json($findSpecialization);
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
