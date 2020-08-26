<?php

namespace Modules\Graduation\Http\Controllers;

//use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Graduation\Entities\GraduationProfilProdi;

class GraduationProfilProdiController extends Controller
{
    private $profilProdiModel;
    public function __construct()
    {
        $this->profilProdiModel = new GraduationProfilProdi();
    }


    public function index()
    {
        $getAllprofilProdi = $this->profilProdiModel->with('fakultas', 'tahun')->get(); // select * from profilProdi;
        return response()->json($getAllprofilProdi);
    }

    public function store(Request $request)
    {
        $createNewprofilProdi = $this->profilProdiModel->create([
            'nama_prodi' => $request->nama_prodi,
            'singkatan_prodi' => $request->singkatan_prodi,
            'fakultas_id' => $request->fakultas_id,
            'logo' => $request->logo,
            'isi_profil' => $request->isi_profil,
            'nama_kaprodi' => $request->nama_kaprodi,
            'image_kaprodi' => $request->image_kaprodi,
            'tahun_id' => $request->tahun_id,
        ]);
        return response()->json($createNewprofilProdi);
    }

    public function show($id)
    {
        $findprofilProdi = $this->profilProdiModel->with('fakultas','tahun')->find($id);
        return response()->json($findprofilProdi);
    }

    public function update($id, Request $request)
    {
        $findprofilProdi = $this->profilProdiModel->find($id);
        $findprofilProdi->update([
            'nama_prodi' => $request->nama_prodi,
            'singkatan_prodi' => $request->singkatan_prodi,
            'fakultas_id' => $request->fakultas_id,
            'logo' => $request->logo,
            'isi_profil' => $request->isi_profil,
            'nama_kaprodi' => $request->nama_kaprodi,
            'image_kaprodi' => $request->image_kaprodi,
            'tahun_id' => $request->tahun_id,
        ]);
        return response()->json($findprofilProdi);
    }

    public function destroy($id)
    {
        $findprofilProdi = $this->profilProdiModel->find($id);
        $findprofilProdi->delete();
        return response()->json($findprofilProdi);
    }
}
