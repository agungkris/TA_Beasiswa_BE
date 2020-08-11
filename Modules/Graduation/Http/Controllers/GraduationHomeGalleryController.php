<?php

namespace Modules\Graduation\Http\Controllers;

//use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Graduation\Entities\GraduationHomeGallery;

class GraduationHomeGalleryController extends Controller
{
    private $homeGalleryModel;
    public function __construct()
    {
        $this->homeGalleryModel = new GraduationHomeGallery();
    }


    public function index()
    {
        $getAllHomeGallery = $this->homeGalleryModel->with('tahun')->get(); // select * from HomeGallery;
        return response()->json($getAllHomeGallery);
    }

    public function store(Request $request)
    {
        $createNewHomeGallery = $this->homeGalleryModel->create([
            'sampul_image' => $request->sampul_image,
            'tema' => $request->tema,
            'sub_tema' => $request->sub_tema,
            'tema_image' => $request->tema_image,
            'deskripsi' => $request->deskripsi,
            'tahun' => $request->tahun,
        ]);
        return response()->json($createNewHomeGallery);
    }

    public function show($id)
    {
        $findHomeGallery = $this->homeGalleryModel->find($id);
        return response()->json($findHomeGallery);
    }

    public function update($id, Request $request)
    {
        $findHomeGallery = $this->homeGalleryModel->find($id);
        $findHomeGallery->update([
            'sampul_image' => $request->sampul_image,
            'tema' => $request->tema,
            'sub_tema' => $request->sub_tema,
            'tema_image' => $request->tema_image,
            'deskripsi' => $request->deskripsi,
            'tahun' => $request->tahun,
        ]);
        return response()->json($findHomeGallery);
    }

    public function destroy($id)
    {
        $findHomeGallery = $this->homeGalleryModel->find($id);
        $findHomeGallery->delete();
        return response()->json($findHomeGallery);
    }
}
