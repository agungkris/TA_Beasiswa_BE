<?php

namespace Modules\Graduation\Http\Controllers;

//use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Graduation\Entities\GraduationLulusanProdi;

class GraduationLulusanProdiController extends Controller
{
    private $lulusanProdiModel;
    public function __construct()
    {
        $this->lulusanProdiModel = new GraduationLulusanProdi();
    }


    public function index()
    {
        $getAllLulusanProdi = $this->lulusanProdiModel->with('prodi','tahun')->get(); // select * from LulusanProdi;
        return response()->json($getAllLulusanProdi);
    }

    public function store(Request $request)
    {
        $createNewLulusanProdi = $this->lulusanProdiModel->create([
            'nama_lengkap' => $request->nama_lengkap,
            'nim' => $request->nim,
            'prodi' => $request->prodi,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'judul_skripsi' => $request->judul_skripsi,
            'ipk' => $request->ipk,
            'keterangan' => $request->keterangan,
            'image' => $request->image,
            'tahun' => $request->tahun,
        ]);
        return response()->json($createNewLulusanProdi);
    }

    public function show($id)
    {
        $findLulusanProdi = $this->lulusanProdiModel->find($id);
        return response()->json($findLulusanProdi);
    }

    public function update($id, Request $request)
    {
        $findLulusanProdi = $this->lulusanProdiModel->find($id);
        $findLulusanProdi->update([
            'nama_lengkap' => $request->nama_lengkap,
            'nim' => $request->nim,
            'prodi' => $request->prodi,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'judul_skripsi' => $request->judul_skripsi,
            'ipk' => $request->ipk,
            'keterangan' => $request->keterangan,
            'image' => $request->image,
            'tahun' => $request->tahun,
        ]);
        return response()->json($findLulusanProdi);
    }

    public function destroy($id)
    {
        $findLulusanProdi = $this->lulusanProdiModel->find($id);
        $findLulusanProdi->delete();
        return response()->json($findLulusanProdi);
    }
}
