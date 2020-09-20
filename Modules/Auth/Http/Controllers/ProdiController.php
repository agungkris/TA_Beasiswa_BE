<?php

namespace Modules\Auth\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Modules\Auth\Entities\Prodi;

class ProdiController extends Controller
{
    private $prodiModel;
    public function __construct()
    {
        $this->prodiModel = new prodi();
    }

    public function index()
    {
        $getAllProdi = $this->prodiModel->with('fakultas')->get()->map(function($value){
            return [
                'id' => $value->id,
                'nama_prodi' => $value->nama_prodi,
                'singkatan_prodi' => $value->singkatan_prodi,
                'fakultas_id' => $value->fakultas_id,
                'fakultas' => $value->fakultas,
                'logo' => asset('upload/'.$value->logo),
            ];
        }); // select * from Prodi;
        return response()->json($getAllProdi);
    }

    public function store(Request $request)
    {
        $payloadData = [
            'nama_prodi' => $request->nama_prodi,
            'singkatan_prodi' => $request->singkatan_prodi,
            'fakultas_id' => $request->fakultas_id,
            'logo' => $request->logo,
        ];
        if ($request->file('logo')) {
           
            $uploadForm = $request->file('logo')->store('document');
            $payloadData['logo'] = $uploadForm;
        }
        $createNewProdi = $this->prodiModel->create($payloadData);
        return response()->json($createNewProdi);
    }

    public function show($id)
    {
        $findProdi = $this->prodiModel->with('fakultas')->find($id);
        $findProdi->logo = asset('upload/'.$findProdi->logo);
        return response()->json($findProdi);
    }

    public function update($id, Request $request)
    {
        $findProdi = $this->prodiModel->find($id);
        $payloadData = [
            'nama_prodi' => $request->nama_prodi,
            'singkatan_prodi' => $request->singkatan_prodi,
            'fakultas_id' => $request->fakultas_id,
            'logo' => $request->logo,
        ];
        if ($request->file('logo')) {
            if ($findProdi && Storage::exists($findProdi->logo)) {
                Storage::delete($findProdi->logo);
            }
            $uploadForm = $request->file('logo')->store('document');
            $payloadData['logo'] = $uploadForm;
        }
        $findProdi->update($payloadData);
        return response()->json($findProdi);
    }

    public function destroy($id)
    {
        $findProdi = $this->prodiModel->find($id);
        $findProdi->delete();
        return response()->json($findProdi);
    }
}
