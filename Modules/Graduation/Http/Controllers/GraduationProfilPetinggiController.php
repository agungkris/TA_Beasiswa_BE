<?php

namespace Modules\Graduation\Http\Controllers;

//use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
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
        $getAllProfilPetinggi = $this->profilPetinggiModel->with('tahun')->get()->map(function($value){
            return [
                'id' => $value->id,
                'kategori' => $value->kategori,
                'nama_lengkap' => $value->nama_lengkap,
                'jabatan' => $value->jabatan,
                'image' => asset('upload/'.$value->image),
                'tahun_id' => $value->tahun_id,
                'tahun' => $value->tahun,
            ];
        });    // select * from Panitia;
        return response()->json($getAllProfilPetinggi);
    }

    public function store(Request $request)
    {
        $payloadData = [
            'kategori' => $request->kategori,
            'nama_lengkap' => $request->nama_lengkap,
            'jabatan' => $request->jabatan,
            'image' => $request->image,
            'tahun_id' => $request->tahun_id,
        ];
        if ($request->file('image')) {
            $uploadForm = $request->file('image')->store('document');
            $payloadData['image'] = $uploadForm;
        }
        $createNewProfilPetinggi = $this->profilPetinggiModel->create($payloadData);
        return response()->json($createNewProfilPetinggi);
    }

    public function show($id)
    {
        $findProfilPetinggi = $this->profilPetinggiModel->with('tahun')->find($id);
        $findProfilPetinggi->image = asset('upload/'.$findProfilPetinggi->image);
        return response()->json($findProfilPetinggi);
    }

    public function update($id, Request $request)
    {
        $findProfilPetinggi = $this->profilPetinggiModel->find($id);
        $payloadData = [
            'kategori' => $request->kategori,
            'nama_lengkap' => $request->nama_lengkap,
            'jabatan' => $request->jabatan,
            'image' => $request->image,
            'tahun_id' => $request->tahun_id,
        ];
        if ($request->file('image')) {
            if ($findProfilPetinggi && Storage::exists($findProfilPetinggi->image)) {
                Storage::delete($findProfilPetinggi->image);
            }
            $uploadForm = $request->file('image')->store('document');
            $payloadData['image'] = $uploadForm;
        }
        $findProfilPetinggi->update($payloadData);
        return response()->json($findProfilPetinggi);
    }

    public function destroy($id)
    {
        $findProfilPetinggi = $this->profilPetinggiModel->find($id);
        $findProfilPetinggi->delete();
        return response()->json($findProfilPetinggi);
    }
}
