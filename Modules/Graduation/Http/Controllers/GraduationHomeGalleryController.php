<?php

namespace Modules\Graduation\Http\Controllers;

//use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
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
        $getAllHomeGallery = $this->homeGalleryModel->with('tahun')->get()->map(function($value){; // select * from HomeGallery;
        return [
            'id' => $value->id,
            'sampul_image' => asset('upload/'.$value->sampul_image),
            'sampul_title' => $value->sampul_title,
            'sub_title' => $value->sub_title,
            'keterangan' => $value->keterangan,
            'tahun_id' => $value->tahun_id,
            'tahun' => $value->tahun
        ];
    });
        return response()->json($getAllHomeGallery);
    }

    public function store(Request $request)
    {
        $payloadData = [
            'sampul_image' => $request->sampul_image,
            'sampul_title' => $request->sampul_title,
            'sub_title' => $request->sub_title,
            'keterangan' => $request->keterangan,
            'tahun_id' => $request->tahun_id,
        ];
        if ($request->file('sampul_image')) {
           
            $uploadForm = $request->file('sampul_image')->store('document');
            $payloadData['sampul_image'] = $uploadForm;
        } 
        $createNewHomeGallery = $this->homeGalleryModel->create($payloadData);
        return response()->json($createNewHomeGallery);
    }

    public function show($id)
    {
        $findHomeGallery = $this->homeGalleryModel->with('tahun')->find($id);
        $findHomeGallery->sampul_image = asset('upload/'.$findHomeGallery->sampul_image);
        return response()->json($findHomeGallery);
    }

    public function update($id, Request $request)
    {
        $findHomeGallery = $this->homeGalleryModel->find($id);
        $payloadData = [
            'sampul_image' => $request->sampul_image,
            'sampul_title' => $request->sampul_title,
            'sub_title' => $request->sub_title,
            'keterangan' => $request->keterangan,
            'tahun_id' => $request->tahun_id,
        ];
        if ($request->file('sampul_image')) {
            if ($findHomeGallery && Storage::exists($findHomeGallery->sampul_image)) {
                Storage::delete($findHomeGallery->sampul_image);
            }
            $uploadForm = $request->file('sampul_image')->store('document');
            $payloadData['sampul_image'] = $uploadForm;
        }
        $findHomeGallery->update($payloadData);
        return response()->json($findHomeGallery);
    }

    public function destroy($id)
    {
        $findHomeGallery = $this->homeGalleryModel->find($id);
        $findHomeGallery->delete();
        return response()->json($findHomeGallery);
    }
}
