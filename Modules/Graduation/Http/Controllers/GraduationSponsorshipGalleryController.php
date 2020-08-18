<?php

namespace Modules\Graduation\Http\Controllers;

//use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
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
        $getAllSponsorshipGallery = $this->sponsorshipGalleryModel->with('tahun')->get(); // select * from Sponsorships;
        return response()->json($getAllSponsorshipGallery);
    }

    public function store(Request $request)
    {
        $createNewSponsorshipGallery = $this->sponsorshipGalleryModel->create([
            'image' => $request->image,
            'subtitle' => $request->subtitle,
            'tahun' => $request->tahun,
        ]);
        return response()->json($createNewSponsorshipGallery);
    }

    public function show($id)
    {
        $findSponsorshipGallery = $this->sponsorshipGalleryModel->find($id);
        return response()->json($findSponsorshipGallery);
    }

    public function update($id, Request $request)
    {
        $findSponsorshipGallery = $this->sponsorshipGalleryModel->find($id);
        $findSponsorshipGallery->update([
            'image' => $request->image,
            'subtitle' => $request->subtitle,
            'tahun' => $request->tahun,
        ]);
        return response()->json($findSponsorshipGallery);
    }

    public function destroy($id)
    {
        $findSponsorshipGallery = $this->sponsorshipGalleryModel->find($id);
        $findSponsorshipGallery->delete();
        return response()->json($findSponsorshipGallery);
    }
}
