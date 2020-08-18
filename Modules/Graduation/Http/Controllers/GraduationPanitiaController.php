<?php

namespace Modules\Graduation\Http\Controllers;

//use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Graduation\Entities\GraduationPanitia;

class GraduationPanitiaController extends Controller
{
    private $panitiaModel;
    public function __construct()
    {
        $this->panitiaModel = new GraduationPanitia();
    }


    public function index()
    {
        $getAllPanitia = $this->panitiaModel->with('tahun')->get(); // select * from Panitia;
        return response()->json($getAllPanitia);
    }

    public function store(Request $request)
    {
        $createNewPanitia = $this->panitiaModel->create([
            'seksi_panitia' => $request->seksi_panitia,
            'jabatan' => $request->jabatan,
            'nama_lengkap' => $request->nama_lengkap,
            'tahun' => $request->tahun,
        ]);
        return response()->json($createNewPanitia);
    }

    public function show($id)
    {
        $findPanitia = $this->panitiaModel->find($id);
        return response()->json($findPanitia);
    }

    public function update($id, Request $request)
    {
        $findPanitia = $this->panitiaModel->find($id);
        $findPanitia->update([
            'seksi_panitia' => $request->seksi_panitia,
            'jabatan' => $request->jabatan,
            'nama_lengkap' => $request->nama_lengkap,
            'tahun' => $request->tahun,
        ]);
        return response()->json($findPanitia);
    }

    public function destroy($id)
    {
        $findPanitia = $this->panitiaModel->find($id);
        $findPanitia->delete();
        return response()->json($findPanitia);
    }
}
