<?php

namespace Modules\Graduation\Http\Controllers;

//use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Modules\Graduation\Entities\GraduationSponsorshipGallery;

class GraduationSponsorshipGalleryController extends Controller
{
    private $sponsorshipGalleryModel;
    public function __construct()
    {
        $this->sponsorshipGalleryModel = new GraduationSponsorshipGallery();
    }


    public function index()
    {
        $getAllSponsorshipGallery = $this->sponsorshipGalleryModel->with('tahun')->get()->map(function($value){
        return [
            'id' => $value->id,
            'image' => asset('upload/'.$value->image),
            'subtitle' => $value->subtitle,
            'tahun_id' => $value->tahun_id,
            'tahun' => $value->tahun,
        ];
    });// select * from Sponsorships;
        return response()->json($getAllSponsorshipGallery);
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
        $createNewSponsorshipGallery = $this->sponsorshipGalleryModel->create($payloadData);
        return response()->json($createNewSponsorshipGallery);
    }

    public function show($id)
    {
        $findSponsorshipGallery = $this->sponsorshipGalleryModel->with('tahun')->find($id);
        $findSponsorshipGallery->image = asset('upload/'.$findSponsorshipGallery->image);
        return response()->json($findSponsorshipGallery);
    }

    public function update($id, Request $request)
    {
        $findSponsorshipGallery = $this->sponsorshipGalleryModel->find($id);
        $payloadData = [
            'image' => $request->image,
            'subtitle' => $request->subtitle,
            'tahun_id' => $request->tahun_id,
        ];
        if ($request->file('image')) {
            if ($findSponsorshipGallery && Storage::exists($findSponsorshipGallery->image)) {
                Storage::delete($findSponsorshipGallery->image);
            }
            $uploadForm = $request->file('image')->store('document');
            $payloadData['image'] = $uploadForm;
        }
        $findSponsorshipGallery->update($payloadData);
        return response()->json($findSponsorshipGallery);
    }

    public function destroy($id)
    {
        $findSponsorshipGallery = $this->sponsorshipGalleryModel->find($id);
        $findSponsorshipGallery->delete();
        return response()->json($findSponsorshipGallery);
    }
}
