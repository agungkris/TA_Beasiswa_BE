<?php

namespace Modules\Auth\Http\Controllers;

//use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Auth\Entities\Fakultas;

class FakultasController extends Controller
{
    private $fakultasModel;
    public function __construct()
    {
        $this->fakultasModel = new Fakultas();
    }


    public function index()
    {
        $getAllFakultas = $this->fakultasModel->get(); // select * from Fakultass;
        return response()->json($getAllFakultas);
    }

    public function store(Request $request)
    {
        $createNewFakultas = $this->fakultasModel->create([
            'nama_fakultas' => $request->nama_fakultas,
            'singkatan_fakultas' => $request->singkatan_fakultas,
        ]);
        return response()->json($createNewFakultas);
    }

    public function show($id)
    {
        $findFakultas = $this->fakultasModel->find($id);
        return response()->json($findFakultas);
    }

    public function update($id, Request $request)
    {
        $findFakultas = $this->fakultasModel->find($id);
        $findFakultas->update([
            'nama_fakultas' => $request->nama_fakultas,
            'singkatan_fakultas' => $request->singkatan_fakultas,
        ]);
        return response()->json($findFakultas);
    }

    public function destroy($id)
    {
        $findFakultas = $this->fakultasModel->find($id);
        $findFakultas->delete();
        return response()->json($findFakultas);
    }
}
