<?php

namespace Modules\Graduation\Http\Controllers;

//use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Modules\Graduation\Entities\GraduationKegiatanProdi;

class GraduationKegiatanProdiController extends Controller
{
    private $homeKegiatanProdiModel;
    public function __construct()
    {
        $this->homeKegiatanProdiModel = new GraduationKegiatanProdi();
    }


    public function index()
    {
        $getAllKegiatanProdi = $this->homeKegiatanProdiModel->with('prodi','tahun')->get()->map(function($value){
        return [
            'id' => $value->id,
            'prodi_id' => $value->prodi_id,
            'prodi' => $value->prodi,
            'image' => asset('upload/'.$value->image),
            'subtitle' => $value->subtitle,
            'tahun_id' => $value->tahun_id,
            'tahun' => $value->tahun,
        ];
        }); // select * from KegiatanProdi;
        return response()->json($getAllKegiatanProdi);
    }

    public function store(Request $request)
    {
        $payloadData =[
            'prodi_id' => $request->prodi_id,
            'image' => $request->image,
            'subtitle' => $request->subtitle,
            'tahun_id' => $request->tahun_id,
        ];
        if ($request->file('image')) {
           
            $uploadForm = $request->file('image')->store('document');
            $payloadData['image'] = $uploadForm;
        }
        $createNewKegiatanProdi = $this->homeKegiatanProdiModel->create($payloadData);
        return response()->json($createNewKegiatanProdi);
    }

    public function show($id)
    {
        $findKegiatanProdi = $this->homeKegiatanProdiModel->with('prodi','tahun')->find($id);
        $findKegiatanProdi->image = asset('upload/'.$findKegiatanProdi->image);
        return response()->json($findKegiatanProdi);
    }

    public function update($id, Request $request)
    {
        $findKegiatanProdi = $this->homeKegiatanProdiModel->find($id);
        $payloadData =[
            'prodi_id' => $request->prodi_id,
            'image' => $request->image,
            'subtitle' => $request->subtitle,
            'tahun_id' => $request->tahun_id,
        ];
        if ($request->file('image')) {
            if ($findKegiatanProdi && Storage::exists($findKegiatanProdi->image)) {
                Storage::delete($findKegiatanProdi->image);
            }
            $uploadForm = $request->file('image')->store('document');
            $payloadData['image'] = $uploadForm;
        }
        $findKegiatanProdi->update($payloadData);
        return response()->json($findKegiatanProdi);
    }

    public function destroy($id)
    {
        $findKegiatanProdi = $this->homeKegiatanProdiModel->find($id);
        $findKegiatanProdi->delete();
        return response()->json($findKegiatanProdi);
    }
}
