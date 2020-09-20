<?php

namespace Modules\Graduation\Http\Controllers;

//use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
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
        $getAllPanitiaGallery = $this->panitiaGalleryModel->with('tahun')->get()->map(function($value){
        return [
            'id' => $value->id,
            'image' => asset('upload/'.$value->image),
            'subtitle' => $value->subtitle,
            'tahun_id' => $value->tahun_id,
            'tahun' => $value->tahun,
        ];
    });    // select * from Panitia;
        return response()->json($getAllPanitiaGallery);
    }

    public function store(Request $request)
    {
        $payloadData = [
            'image' => $request->image,
            'subtitle' => $request->subtitle,
            'tahun_id' => $request->tahun_id,
        ];
        if ($request->file('image')) {
            $uploadForm = $request->file('image')->store('document');
            $payloadData['image'] = $uploadForm;
        }
        $createNewPanitiaGallery = $this->panitiaGalleryModel->create($payloadData);
        return response()->json($createNewPanitiaGallery);
    }

    public function show($id)
    {
        $findPanitiaGallery = $this->panitiaGalleryModel->with('tahun')->find($id);
        $findPanitiaGallery->image = asset('upload/'.$findPanitiaGallery->image);
        return response()->json($findPanitiaGallery);
    }

    public function update($id, Request $request)
    {
        $findPanitiaGallery = $this->panitiaGalleryModel->find($id);
        $payloadData = [
            'image' => $request->image,
            'subtitle' => $request->subtitle,
            'tahun_id' => $request->tahun_id,
        ];
        if ($request->file('image')) {
            if ($findPanitiaGallery && Storage::exists($findPanitiaGallery->image)) {
                Storage::delete($findPanitiaGallery->image);
            }
            $uploadForm = $request->file('image')->store('document');
            $payloadData['image'] = $uploadForm;
        }
        $findPanitiaGallery->update($payloadData);
        return response()->json($findPanitiaGallery);
    }

    public function destroy($id)
    {
        $findPanitiaGallery = $this->panitiaGalleryModel->find($id);
        $findPanitiaGallery->delete();
        return response()->json($findPanitiaGallery);
    }
}
