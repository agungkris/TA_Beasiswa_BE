<?php

namespace Modules\Graduation\Http\Controllers;

//use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
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
        $getAllUnitLain = $this->unitLainModel->with('tahun')->get()->map(function($value){
            return [
                'id' => $value->id,
                'nama_kepala_unit' => $value->nama_kepala_unit,
                'image' => asset('upload/'.$value->image),
                'deskripsi' => $value->deskripsi,
                'kategori' => $value->kategori,
                'tahun_id' => $value->tahun_id,
                'tahun' => $value->tahun,
            ];
        });// select * from Sponsorships;
        return response()->json($getAllUnitLain);
    }

    public function store(Request $request)
    {
        $payloadData = [
            'nama_kepala_unit' => $request->nama_kepala_unit,
            'image' => $request->image,
            'deskripsi' => $request->deskripsi,
            'kategori' => $request->kategori,
            'tahun_id' => $request->tahun_id,
        ];
        if ($request->file('image')) {
            $uploadForm = $request->file('image')->store('document');
            $payloadData['image'] = $uploadForm;
        }
        $createNewUnitLain = $this->unitLainModel->create($payloadData);
        return response()->json($createNewUnitLain);
    }

    public function show($id)
    {
        $findUnitLain = $this->unitLainModel->with('tahun')->find($id);
        $findUnitLain->image = asset('upload/'.$findUnitLain->image);
        return response()->json($findUnitLain);
    }

    public function update($id, Request $request)
    {
        $findUnitLain = $this->unitLainModel->find($id);
        $payloadData = [
            'nama_kepala_unit' => $request->nama_kepala_unit,
            'image' => $request->image,
            'deskripsi' => $request->deskripsi,
            'kategori' => $request->kategori,
            'tahun_id' => $request->tahun_id,
        ];
        if ($request->file('image')) {
            if ($findUnitLain && Storage::exists($findUnitLain->image)) {
                Storage::delete($findUnitLain->image);
            }
            $uploadForm = $request->file('image')->store('document');
            $payloadData['image'] = $uploadForm;
        }
        $findUnitLain->update($payloadData);
        return response()->json($findUnitLain);
    }

    public function destroy($id)
    {
        $findUnitLain = $this->unitLainModel->find($id);
        $findUnitLain->delete();
        return response()->json($findUnitLain);
    }
}