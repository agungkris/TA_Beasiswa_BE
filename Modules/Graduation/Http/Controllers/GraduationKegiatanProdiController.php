<?php

namespace Modules\Graduation\Http\Controllers;

//use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
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
        $getAllKegiatanProdi = $this->homeKegiatanProdiModel->with('prodi','tahun')->get(); // select * from KegiatanProdi;
        return response()->json($getAllKegiatanProdi);
    }

    public function store(Request $request)
    {
        $createNewKegiatanProdi = $this->homeKegiatanProdiModel->create([
            'nama_prodi' => $request->nama_prodi,
            'image' => $request->image,
            'subtitle' => $request->subtitle,
            'tahun' => $request->tahun,
        ]);
        return response()->json($createNewKegiatanProdi);
    }

    public function show($id)
    {
        $findKegiatanProdi = $this->homeKegiatanProdiModel->find($id);
        return response()->json($findKegiatanProdi);
    }

    public function update($id, Request $request)
    {
        $findKegiatanProdi = $this->homeKegiatanProdiModel->find($id);
        $findKegiatanProdi->update([
            'nama_prodi' => $request->nama_prodi,
            'image' => $request->image,
            'subtitle' => $request->subtitle,
            'tahun' => $request->tahun,
        ]);
        return response()->json($findKegiatanProdi);
    }

    public function destroy($id)
    {
        $findKegiatanProdi = $this->homeKegiatanProdiModel->find($id);
        $findKegiatanProdi->delete();
        return response()->json($findKegiatanProdi);
    }
}
