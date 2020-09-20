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
                // 'subbab' => $value->subbab,
                // 'text_laporan' => $value->text_laporan,
                'file' => asset('upload/'.$value->file),
                // 'subtitle' => $value->subtitle,
                'tahun_id' => $value->tahun_id,
                'tahun' => $value->tahun,
            ];
        });
        return response()->json($getAllLaporanAkademik);
    }

    public function store(Request $request)
    {
        $payloadData = [
            // 'subbab' => $request->subbab,
            // 'text_laporan' => $request->text_laporan,
            'file' => $request->file,
            // 'subtitle' => $request->subtitle,
            'tahun_id' => $request->tahun_id,
        ];
        if ($request->file('file')) {
            $uploadForm = $request->file('file')->storeAs(
                'document', $request->file('file')->getClientOriginalName()
            );
            $payloadData['file'] = $uploadForm;
        }
        $createNewLaporanAkademik = $this->laporanAkademikModel->create($payloadData);
        return response()->json($createNewLaporanAkademik);
    }

    public function show($id)
    {
        $findLaporanAkademik = $this->laporanAkademikModel->with('tahun')->find($id);
        $findLaporanAkademik->file = asset('upload/'.$findLaporanAkademik->file);
        return response()->json($findLaporanAkademik);
    }

    public function update($id, Request $request)
    {
        $findLaporanAkademik = $this->laporanAkademikModel->find($id);
        $payloadData = [
            // 'subbab' => $request->subbab,
            // 'text_laporan' => $request->text_laporan,
            'file' => $request->file,
            // 'subtitle' => $request->subtitle,
            'tahun_id' => $request->tahun_id,
        ];
        if ($request->file('file')) {
            if ($findLaporanAkademik && Storage::exists($findLaporanAkademik->file)) {
                Storage::delete($findLaporanAkademik->file);
            }
            $uploadForm = $request->file('file')->storeAs(
                'document', $request->file('file')->getClientOriginalName()
            );
            $payloadData['file'] = $uploadForm;
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
