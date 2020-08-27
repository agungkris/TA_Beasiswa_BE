<?php

namespace Modules\Graduation\Http\Controllers;

//use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Graduation\Entities\GraduationProfilPetinggi;

class GraduationProfilPetinggiController extends Controller
{
    private $profilPetinggiModel;
    public function __construct()
    {
        $this->profilPetinggiModel = new GraduationProfilPetinggi();
    }


    public function index()
    {
        $getAllProfilPetinggi = $this->profilPetinggiModel->with('tahun')->get(); // select * from Panitia;
        return response()->json($getAllProfilPetinggi);
    }

    public function store(Request $request)
    {
        $createNewProfilPetinggi = $this->profilPetinggiModel->create([
            'kategori' => $request->kategori,
            'nama_lengkap' => $request->nama_lengkap,
            'jabatan' => $request->jabatan,
            'image' => $request->image,
            'tahun_id' => $request->tahun_id,
        ]);
        return response()->json($createNewProfilPetinggi);
    }

    public function show($id)
    {
        $findProfilPetinggi = $this->profilPetinggiModel->with('tahun')->find($id);
        return response()->json($findProfilPetinggi);
    }

    public function update($id, Request $request)
    {
        $findProfilPetinggi = $this->profilPetinggiModel->find($id);
        $findProfilPetinggi->update([
            'kategori' => $request->kategori,
            'nama_lengkap' => $request->nama_lengkap,
            'jabatan' => $request->jabatan,
            'image' => $request->image,
            'tahun_id' => $request->tahun_id,
        ]);
        return response()->json($findProfilPetinggi);
    }

    public function destroy($id)
    {
        $findProfilPetinggi = $this->profilPetinggiModel->find($id);
        $findProfilPetinggi->delete();
        return response()->json($findProfilPetinggi);
    }
}
