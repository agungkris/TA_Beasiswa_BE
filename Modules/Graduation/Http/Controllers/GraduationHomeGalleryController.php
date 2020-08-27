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
        $getAllHomeGallery = $this->homeGalleryModel->with('tahun')->get(); // select * from HomeGallery;
        return response()->json($getAllHomeGallery);
    }

    public function store(Request $request)
    {
        $payloadData = [
            'sampul_image' => $request->sampul_image,
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'tema' => $request->tema,
            'tema_image' => $request->tema_image,
            'deskripsi' => $request->deskripsi,
            'tahun_id' => $request->tahun_id,
        ];
        if ($request->file('tema_image')) {
           
            $uploadForm = $request->file('tema_image')->store('document');
            $payloadData['tema_image'] = $uploadForm;
        }
        $createNewHomeGallery = $this->homeGalleryModel->create($payloadData);
        return response()->json($createNewHomeGallery);
    }

    public function show($id)
    {
        $findHomeGallery = $this->homeGalleryModel->with('tahun')->find($id);
        $findHomeGallery
            ->tema_image = asset('upload/'.$findHomeGallery->tema_image);
        return response()->json($findHomeGallery);
    }

    public function update($id, Request $request)
    {
        $findHomeGallery = $this->homeGalleryModel->find($id);
        $payloadData = [
            'sampul_image' => $request->sampul_image,
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'tema' => $request->tema,
            'tema_image' => $request->tema_image,
            'deskripsi' => $request->deskripsi,
            'tahun_id' => $request->tahun_id,
        ];
        if ($request->file('tema_image')) {
            if ($findHomeGallery && Storage::exists($findHomeGallery->tema_image)) {
                Storage::delete($findHomeGallery->tema_image);
            }
            $uploadForm = $request->file('tema_image')->store('document');
            $payloadData['tema_image'] = $uploadForm;
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
