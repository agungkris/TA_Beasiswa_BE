<?php

namespace Modules\Graduation\Http\Controllers;

//use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Graduation\Entities\GraduationLaporanAkademik;

class GraduationLaporanAkademikController extends Controller
{
    private $laporanAkademikModel;
    public function __construct()
    {
        $this->laporanAkademikModel = new GraduationLaporanAkademik();
    }


    public function index()
    {
        $getAllLaporanAkademik = $this->laporanAkademikModel->with('tahun')->get(); // select * from LaporanAkademik;
        return response()->json($getAllLaporanAkademik);
    }

    public function store(Request $request)
    {
        $createNewLaporanAkademik = $this->laporanAkademikModel->create([
            'subbab' => $request->subbab,
            'text_laporan' => $request->text_laporan,
            'image1' => $request->image1,
            'image2' => $request->image2,
            'subtitle' => $request->subtitle,
            'tahun_id' => $request->tahun_id,
        ]);
        return response()->json($createNewLaporanAkademik);
    }

    public function show($id)
    {
        $findLaporanAkademik = $this->laporanAkademikModel->with('tahun')->find($id);
        return response()->json($findLaporanAkademik);
    }

    public function update($id, Request $request)
    {
        $findLaporanAkademik = $this->laporanAkademikModel->find($id);
        $findLaporanAkademik->update([
            'subbab' => $request->subbab,
            'text_laporan' => $request->text_laporan,
            'image1' => $request->image1,
            'image2' => $request->image2,
            'subtitle' => $request->subtitle,
            'tahun_id' => $request->tahun_id,
        ]);
        return response()->json($findLaporanAkademik);
    }

    public function destroy($id)
    {
        $findLaporanAkademik = $this->laporanAkademikModel->find($id);
        $findLaporanAkademik->delete();
        return response()->json($findLaporanAkademik);
    }
}
