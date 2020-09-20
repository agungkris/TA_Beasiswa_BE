<?php

namespace Modules\Graduation\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
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
        $getAllProfilProdi = $this->profilProdiModel->with('prodi','tahun')->get()->map(function($value){
            return[
                'id' => $value->id,
                'prodi_id' => $value->prodi_id,
                'prodi' => $value->prodi,
                'kategori_thesis' => $value->kategori_thesis,
                'isi_profil' => $value->isi_profil,
                'nama_kaprodi' => $value->nama_kaprodi,
                'image_kaprodi' => asset('upload/'.$value->image_kaprodi),
                'tahun_id' => $value->tahun_id,
                'tahun' => $value->tahun,
            ];
        }); // select * from profilProdi;
        return response()->json($getAllProfilProdi);
    }

    public function store(Request $request)
    {
        $payloadData = [
            'prodi_id' => $request->prodi_id,
            'kategori_thesis' => $request->kategori_thesis,
            'isi_profil' => $request->isi_profil,
            'nama_kaprodi' => $request->nama_kaprodi,
            'image_kaprodi' => $request->image_kaprodi,
            'tahun_id' => $request->tahun_id,
        ];
        if ($request->file('image_kaprodi')) {
            $uploadForm = $request->file('image_kaprodi')->store('document');
            $payloadData['image_kaprodi'] = $uploadForm;
        }
        $createNewProfilProdi = $this->profilProdiModel->create($payloadData);
        return response()->json($createNewProfilProdi);
    }

    public function show($id)
    {
        $findProfilProdi = $this->profilProdiModel->with('prodi','tahun')->find($id);
        $findProfilProdi->image_kaprodi = asset('upload/'.$findProfilProdi->image_kaprodi);
        return response()->json($findProfilProdi);
    }

    public function update($id, Request $request)
    {
        $findProfilProdi = $this->profilProdiModel->find($id);
        $payloadData = [
            'prodi_id' => $request->prodi_id,
            'kategori_thesis' => $request->kategori_thesis,
            'isi_profil' => $request->isi_profil,
            'nama_kaprodi' => $request->nama_kaprodi,
            'image_kaprodi' => $request->image_kaprodi,
            'tahun_id' => $request->tahun_id,
        ];
        if ($request->file('image_kaprodi')) {
            if ($findProfilProdi && Storage::exists($findProfilProdi->image_kaprodi)) {
                Storage::delete($findProfilProdi->image_kaprodi);
            }
            $uploadForm = $request->file('image_kaprodi')->store('document');
            $payloadData['image_kaprodi'] = $uploadForm;
        }
        $findProfilProdi->update($payloadData);
        return response()->json($findProfilProdi);
    }

    public function destroy($id)
    {
        $findProfilProdi = $this->profilProdiModel->find($id);
        $findProfilProdi->delete();
        return response()->json($findProfilProdi);
    }
}
