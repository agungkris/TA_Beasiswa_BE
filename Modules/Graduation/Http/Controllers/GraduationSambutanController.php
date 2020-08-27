<?php

namespace Modules\Graduation\Http\Controllers;

//use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Graduation\Entities\GraduationSambutan;

class GraduationSambutanController extends Controller
{
    private $sambutanModel;
    public function __construct()
    {
        $this->sambutanModel = new GraduationSambutan();
    }


    public function index()
    {
        $getAllSambutan = $this->sambutanModel->with('tahun')->get(); // select * from sambutans;
        return response()->json($getAllSambutan);
    }

    public function store(Request $request)
    {
        $createNewSambutan = $this->sambutanModel->create([
            'nama_lengkap' => $request->nama_lengkap,
            'kategori' => $request->kategori,
            'text_sambutan' => $request->text_sambutan,
            'image' => $request->image,
            'tahun_id' => $request->tahun_id,
        ]);
        return response()->json($createNewSambutan);
    }

    public function show($id)
    {
        $findSambutan = $this->sambutanModel->with('tahun')->find($id);
        return response()->json($findSambutan);
    }

    public function update($id, Request $request)
    {
        $findSambutan = $this->sambutanModel->find($id);
        $findSambutan->update([
            'nama_lengkap' => $request->nama_lengkap,
            'kategori' => $request->kategori,
            'text_sambutan' => $request->text_sambutan,
            'image' => $request->image,
            'tahun_id' => $request->tahun_id,
        ]);
        return response()->json($findSambutan);
    }

    public function destroy($id)
    {
        $findSambutan = $this->sambutanModel->find($id);
        $findSambutan->delete();
        return response()->json($findSambutan);
    }
}
