<?php

namespace Modules\Graduation\Http\Controllers;

//use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Graduation\Entities\GraduationUnitLain;

class GraduationUnitLainController extends Controller
{
    private $unitLainModel;
    public function __construct()
    {
        $this->unitLainModel = new GraduationUnitLain();
    }


    public function index()
    {
        $getAllUnitLain = $this->unitLainModel->with('tahun')->get(); // select * from Sponsorships;
        return response()->json($getAllUnitLain);
    }

    public function store(Request $request)
    {
        $createNewUnitLain = $this->unitLainModel->create([
            'nama_kepala_unit' => $request->nama_kepala_unit,
            'image' => $request->image,
            'subbab' => $request->subbab,
            'deskripsi' => $request->deskripsi,
            'kategori' => $request->kategori,
            'tahun_id' => $request->tahun_id,
        ]);
        return response()->json($createNewUnitLain);
    }

    public function show($id)
    {
        $findUnitLain = $this->unitLainModel->with('tahun')->find($id);
        return response()->json($findUnitLain);
    }

    public function update($id, Request $request)
    {
        $findUnitLain = $this->unitLainModel->find($id);
        $findUnitLain->update([
            'nama_kepala_unit' => $request->nama_kepala_unit,
            'image' => $request->image,
            'subbab' => $request->subbab,
            'deskripsi' => $request->deskripsi,
            'kategori' => $request->kategori,
            'tahun_id' => $request->tahun_id,
        ]);
        return response()->json($findUnitLain);
    }

    public function destroy($id)
    {
        $findUnitLain = $this->unitLainModel->find($id);
        $findUnitLain->delete();
        return response()->json($findUnitLain);
    }
}