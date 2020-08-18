<?php

namespace Modules\Graduation\Http\Controllers;

//use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Graduation\Entities\GraduationSponsorship;

class GraduationSponsorshipController extends Controller
{
    private $sponsorshipModel;
    public function __construct()
    {
        $this->sponsorshipModel = new GraduationSponsorship();
    }


    public function index()
    {
        $getAllSponsorship = $this->sponsorshipModel->with('tahun')->get(); // select * from Sponsorships;
        return response()->json($getAllSponsorship);
    }

    public function store(Request $request)
    {
        $createNewSponsorship = $this->sponsorshipModel->create([
            'nama_donatur' => $request->nama_donatur,
            'bentuk_dukungan' => $request->bentuk_dukungan,
            'tahun' => $request->tahun,
        ]);
        return response()->json($createNewSponsorship);
    }

    public function show($id)
    {
        $findSponsorship = $this->sponsorshipModel->find($id);
        return response()->json($findSponsorship);
    }

    public function update($id, Request $request)
    {
        $findSponsorship = $this->sponsorshipModel->find($id);
        $findSponsorship->update([
            'nama_donatur' => $request->nama_donatur,
            'bentuk_dukungan' => $request->bentuk_dukungan,
            'tahun' => $request->tahun,
        ]);
        return response()->json($findSponsorship);
    }

    public function destroy($id)
    {
        $findSponsorship = $this->sponsorshipModel->find($id);
        $findSponsorship->delete();
        return response()->json($findSponsorship);
    }
}
