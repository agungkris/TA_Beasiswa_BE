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
            'prodi_id' => $request->prodi_id,
            'image' => $request->image,
            'subtitle' => $request->subtitle,
            'tahun_id' => $request->tahun_id,
        ]);
        return response()->json($createNewKegiatanProdi);
    }

    public function show($id)
    {
        $findKegiatanProdi = $this->homeKegiatanProdiModel->with('prodi','tahun')->find($id);
        return response()->json($findKegiatanProdi);
    }

    public function update($id, Request $request)
    {
        $findKegiatanProdi = $this->homeKegiatanProdiModel->find($id);
        $findKegiatanProdi->update([
            'prodi_id' => $request->prodi_id,
            'image' => $request->image,
            'subtitle' => $request->subtitle,
            'tahun_id' => $request->tahun_id,
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
