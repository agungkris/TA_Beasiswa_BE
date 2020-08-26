<?php

namespace Modules\Graduation\Http\Controllers;

//use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Graduation\Entities\GraduationLulusanTerbaik;

class GraduationLulusanTerbaikController extends Controller
{
    private $lulusanTerbaikModel;
    public function __construct()
    {
        $this->lulusanTerbaikModel = new GraduationLulusanTerbaik();
    }


    public function index()
    {
        $getAllLulusanTerbaik = $this->lulusanTerbaikModel->with('lulusan','prodi','tahun')->get(); // select * from LulusanTerbaik;
        return response()->json($getAllLulusanTerbaik);
    }

    public function store(Request $request)
    {
        $createNewLulusanTerbaik = $this->lulusanTerbaikModel->create([
            'title' => $request->title,
            'lulusan_prodi_id' => $request->lulusan_prodi_id,
            'prodi_id' => $request->prodi_id,
            'kategori' => $request->kategori,
            'prestasi' => $request->prestasi,
            'testimoni' => $request->testimoni,
            'tahun_id' => $request->tahun_id,
        ]);
        return response()->json($createNewLulusanTerbaik);
    }

    public function show($id)
    {
        $findLulusanTerbaik = $this->lulusanTerbaikModel->with('lulusan','prodi','tahun')->find($id);
        return response()->json($findLulusanTerbaik);
    }

    public function update($id, Request $request)
    {
        $findLulusanTerbaik = $this->lulusanTerbaikModel->find($id);
        $findLulusanTerbaik->update([
            'title' => $request->title,
            'lulusan_prodi_id' => $request->lulusan_prodi_id,
            'prodi_id' => $request->prodi_id,
            'kategori' => $request->kategori,
            'prestasi' => $request->prestasi,
            'testimoni' => $request->testimoni,
            'tahun_id' => $request->tahun_id,
        ]);
        return response()->json($findLulusanTerbaik);
    }

    public function destroy($id)
    {
        $findLulusanTerbaik = $this->lulusanTerbaikModel->find($id);
        $findLulusanTerbaik->delete();
        return response()->json($findLulusanTerbaik);
    }
}
