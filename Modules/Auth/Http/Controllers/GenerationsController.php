<?php

namespace Modules\Auth\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Auth\Entities\Generations;

class GenerationsController extends Controller
{
    private $generationsModel;
    public function __construct()
    {
        $this->generationsModel = new Generations();
    }

    public function index()
    {
        $getAllGenerations = $this->generationsModel->get(); // select * from Generationss;
        return response()->json($getAllGenerations);
    }

    public function store(Request $request)
    {
        $createNewGenerations = $this->generationsModel->create([
            'name' => $request->name,
        ]);
        return response()->json($createNewGenerations);
    }

    public function show($id)
    {
        $findGenerations = $this->generationsModel->find($id);
        return response()->json($findGenerations);
    }

    public function update($id, Request $request)
    {
        $findGenerations = $this->generationsModel->find($id);
        $findGenerations->update([
            'name' => $request->name,
        ]);
        return response()->json($findGenerations);
    }

    public function destroy($id)
    {
        $findGenerations = $this->generationsModel->find($id);
        $findGenerations->delete();
        return response()->json($findGenerations);
    }
}
