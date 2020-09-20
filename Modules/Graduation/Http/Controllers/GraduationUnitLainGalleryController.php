<?php

namespace Modules\Graduation\Http\Controllers;

//use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        $getAllUnitLainGallery = $this->unitLainGalleryModel->with('unit_lain','tahun')->get()->map(function($value){
            return [
                'id' => $value->id,
                'image' => asset('upload/'.$value->image),
                'subtitle' => $value->subtitle,
                'unit_lain_id' => $value->unit_lain_id,
                'unit_lain' => $value->unit_lain,
                'tahun_id' => $value->tahun_id,
                'tahun' => $value->tahun,
            ];
        }); // select * from Sponsorships;
        return response()->json($getAllUnitLainGallery);
    }

    public function store(Request $request)
    {
        $payloadData = [
            'image' => $request->image,
            'subtitle' => $request->subtitle,
            'unit_lain_id' => $request->unit_lain_id,
            'tahun_id' => $request->tahun_id,
        ];
        if ($request->file('image')) {
            $uploadForm = $request->file('image')->store('document');
            $payloadData['image'] = $uploadForm;
        }
        $createNewUnitLainGallery = $this->unitLainGalleryModel->create($payloadData);
        return response()->json($createNewUnitLainGallery);
    }

    public function show($id)
    {
        $findUnitLainGallery = $this->unitLainGalleryModel->with('unit_lain','tahun')->find($id);
        $findUnitLainGallery->image = asset('upload/'.$findUnitLainGallery->image);
        return response()->json($findUnitLainGallery);
    }

    public function update($id, Request $request)
    {
        $findUnitLainGallery = $this->unitLainGalleryModel->find($id);
        $payloadData = [
            'image' => $request->image,
            'subtitle' => $request->subtitle,
            'unit_lain_id' => $request->unit_lain_id,
            'tahun_id' => $request->tahun_id,
        ];
        if ($request->file('image')) {
            if ($findUnitLainGallery && Storage::exists($findUnitLainGallery->image)) {
                Storage::delete($findUnitLainGallery->image);
            }
            $uploadForm = $request->file('image')->store('document');
            $payloadData['image'] = $uploadForm;
        }
        $findUnitLainGallery->update($payloadData);
        return response()->json($findUnitLainGallery);
    }

    public function destroy($id)
    {
        $findUnitLainGallery = $this->unitLainGalleryModel->find($id);
        $findUnitLainGallery->delete();
        return response()->json($findUnitLainGallery);
    }
}