<?php

namespace Modules\Graduation\Http\Controllers;

//use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Graduation\Entities\GraduationPanitiaGallery;

class GraduationPanitiaGalleryController extends Controller
{
    private $panitiaGalleryModel;
    public function __construct()
    {
        $this->panitiaGalleryModel = new GraduationPanitiaGallery();
    }


    public function index()
    {
        $getAllPanitiaGallery = $this->panitiaGalleryModel->with('tahun')->get(); // select * from Panitia;
        return response()->json($getAllPanitiaGallery);
    }

    public function store(Request $request)
    {
        $createNewPanitiaGallery = $this->panitiaGalleryModel->create([
            'seksi_panitia' => $request->seksi_panitia,
            'jabatan' => $request->jabatan,
            'nama_lengkap' => $request->nama_lengkap,
            'tahun' => $request->tahun,
        ]);
        return response()->json($createNewPanitiaGallery);
    }

    public function show($id)
    {
        $findPanitiaGallery = $this->panitiaGalleryModel->with('tahun')->find($id);
        return response()->json($findPanitiaGallery);
    }

    public function update($id, Request $request)
    {
        $findPanitiaGallery = $this->panitiaGalleryModel->find($id);
        $findPanitiaGallery->update([
            'seksi_panitia' => $request->seksi_panitia,
            'jabatan' => $request->jabatan,
            'nama_lengkap' => $request->nama_lengkap,
            'tahun' => $request->tahun,
        ]);
        return response()->json($findPanitiaGallery);
    }

    public function destroy($id)
    {
        $findPanitiaGallery = $this->panitiaGalleryModel->find($id);
        $findPanitiaGallery->delete();
        return response()->json($findPanitiaGallery);
    }
}
