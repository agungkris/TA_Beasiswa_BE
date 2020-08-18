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
        $getAllLulusanTerbaik = $this->lulusanTerbaikModel->with('lulusan','tahun')->get(); // select * from LulusanTerbaik;
        return response()->json($getAllLulusanTerbaik);
    }

    public function store(Request $request)
    {
        $createNewLulusanTerbaik = $this->lulusanTerbaikModel->create([
            'id_lulusan' => $request->id_lulusan,
            'prestasi' => $request->prestasi,
            'testimoni' => $request->testimoni,
            'tahun' => $request->tahun,
        ]);
        return response()->json($createNewLulusanTerbaik);
    }

    public function show($id)
    {
        $findLulusanTerbaik = $this->lulusanTerbaikModel->find($id);
        return response()->json($findLulusanTerbaik);
    }

    public function update($id, Request $request)
    {
        $findLulusanTerbaik = $this->lulusanTerbaikModel->find($id);
        $findLulusanTerbaik->update([
            'id_lulusan' => $request->id_lulusan,
            'prestasi' => $request->prestasi,
            'testimoni' => $request->testimoni,
            'tahun' => $request->tahun,
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
