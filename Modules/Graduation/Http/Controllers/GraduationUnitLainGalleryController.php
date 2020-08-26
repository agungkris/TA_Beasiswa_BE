<?php

namespace Modules\Graduation\Http\Controllers;

//use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Graduation\Entities\GraduationUnitLainGallery;

class GraduationUnitLainGalleryController extends Controller
{
    private $unitLainGalleryModel;
    public function __construct()
    {
        $this->unitLainGalleryModel = new GraduationUnitLainGallery();
    }


    public function index()
    {
        $getAllUnitLainGallery = $this->unitLainGalleryModel->with('tahun')->get(); // select * from Sponsorships;
        return response()->json($getAllUnitLainGallery);
    }

    public function store(Request $request)
    {
        $createNewUnitLainGallery = $this->unitLainGalleryModel->create([
            'image' => $request->image,
            'subtitle' => $request->subtitle,
            'kategori' => $request->kategori,
            'tahun_id' => $request->tahun_id,
        ]);
        return response()->json($createNewUnitLainGallery);
    }

    public function show($id)
    {
        $findUnitLainGallery = $this->unitLainGalleryModel->with('tahun')->find($id);
        return response()->json($findUnitLainGallery);
    }

    public function update($id, Request $request)
    {
        $findUnitLainGallery = $this->unitLainGalleryModel->find($id);
        $findUnitLainGallery->update([
            'image' => $request->image,
            'subtitle' => $request->subtitle,
            'kategori' => $request->kategori,
            'tahun_id' => $request->tahun_id,
        ]);
        return response()->json($findUnitLainGallery);
    }

    public function destroy($id)
    {
        $findUnitLainGallery = $this->unitLainGalleryModel->find($id);
        $findUnitLainGallery->delete();
        return response()->json($findUnitLainGallery);
    }
}