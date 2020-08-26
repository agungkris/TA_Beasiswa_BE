<?php

namespace Modules\Graduation\Http\Controllers;

//use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Graduation\Entities\GraduationUndangan;

class GraduationUndanganController extends Controller
{
    private $undanganModel;
    public function __construct()
    {
        $this->undanganModel = new GraduationUndangan();
    }


    public function index()
    {
        $getAllUndangan = $this->undanganModel->with('tahun')->get(); // select * from Sponsorships;
        return response()->json($getAllUndangan);
    }

    public function store(Request $request)
    {
        $createNewUndangan = $this->undanganModel->create([
            'undangan' => $request->undangan,
            'tahun_id' => $request->tahun_id,
        ]);
        return response()->json($createNewUndangan);
    }

    public function show($id)
    {
        $findUndangan = $this->undanganModel->with('tahun')->find($id);
        return response()->json($findUndangan);
    }

    public function update($id, Request $request)
    {
        $findUndangan = $this->undanganModel->find($id);
        $findUndangan->update([
            'undangan' => $request->undangan,
            'tahun_id' => $request->tahun_id,
        ]);
        return response()->json($findUndangan);
    }

    public function destroy($id)
    {
        $findUndangan = $this->undanganModel->find($id);
        $findUndangan->delete();
        return response()->json($findUndangan);
    }
}