<?php

namespace Modules\Graduation\Http\Controllers;

//use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
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
        $getAllLaporanAkademik = $this->laporanAkademikModel->with('tahun')->get()->map(function($value){ // select * from LaporanAkademik;
            return [
                'id' => $value->id,
                'subbab' => $value->subbab,
                'text_laporan' => $value->text_laporan,
                'image' => asset('upload/'.$value->image),
                'subtitle' => $value->subtitle,
                'tahun_id' => $value->tahun_id,
                'tahun' => $value->tahun,
            ];
        });
        return response()->json($getAllLaporanAkademik);
    }

    public function store(Request $request)
    {
        $payloadData = [
            'subbab' => $request->subbab,
            'text_laporan' => $request->text_laporan,
            'image' => $request->image,
            'subtitle' => $request->subtitle,
            'tahun_id' => $request->tahun_id,
        ];
        if ($request->file('image')) {
            $uploadForm = $request->file('image')->store('document');
            $payloadData['image'] = $uploadForm;
        }
        $createNewLaporanAkademik = $this->laporanAkademikModel->create($payloadData);
        return response()->json($createNewLaporanAkademik);
    }

    public function show($id)
    {
        $findLaporanAkademik = $this->laporanAkademikModel->with('tahun')->find($id);
        $findLaporanAkademik->image = asset('upload/'.$findLaporanAkademik->image);
        return response()->json($findLaporanAkademik);
    }

    public function update($id, Request $request)
    {
        $findLaporanAkademik = $this->laporanAkademikModel->find($id);
        $payloadData = [
            'subbab' => $request->subbab,
            'text_laporan' => $request->text_laporan,
            'image' => $request->image,
            'subtitle' => $request->subtitle,
            'tahun_id' => $request->tahun_id,
        ];
        if ($request->file('image')) {
            if ($findLaporanAkademik && Storage::exists($findLaporanAkademik->image)) {
                Storage::delete($findLaporanAkademik->image);
            }
            $uploadForm = $request->file('image')->store('document');
            $payloadData['image'] = $uploadForm;
        }
        $findLaporanAkademik->update($payloadData);
        return response()->json($findLaporanAkademik);
    }

    public function destroy($id)
    {
        $findLaporanAkademik = $this->laporanAkademikModel->find($id);
        $findLaporanAkademik->delete();
        return response()->json($findLaporanAkademik);
    }
}
