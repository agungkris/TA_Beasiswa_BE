<?php

namespace Modules\Graduation\Http\Controllers;

//use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
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
        $getAllUndangan = $this->undanganModel->with('tahun')->get()->map(function($value){
            return [
                'id' => $value->id,
                'undangan' => asset('upload/'.$value->undangan),
                'tahun_id' => $value->tahun_id,
                'tahun' => $value->tahun
            ];
        }); // select * from Sponsorships;
        return response()->json($getAllUndangan);
    }

    public function store(Request $request)
    {
        $payloadData = [
            'undangan' => $request->undangan,
            'tahun_id' => $request->tahun_id,
        ];
        if ($request->file('undangan')) {
            $uploadForm = $request->file('undangan')->storeAs(
                'document', $request->file('undangan')->getClientOriginalName()
            );
            $payloadData['undangan'] = $uploadForm;
        }
        $createNewUndangan = $this->undanganModel->create($payloadData);
        return response()->json($createNewUndangan);
    }

    public function show($id)
    {
        $findUndangan = $this->undanganModel->with('tahun')->find($id);
        $findUndangan->undangan = asset('upload/'.$findUndangan->undangan);
        return response()->json($findUndangan);
    }

    public function update($id, Request $request)
    {
        $findUndangan = $this->undanganModel->find($id);
        $payloadData = [
            'undangan' => $request->undangan,
            'tahun_id' => $request->tahun_id,
        ];
        if ($request->file('undangan')) {
            if ($findUndangan && Storage::exists($findUndangan->undangan)) {
                Storage::delete($findUndangan->undangan);
            }
            $uploadForm = $request->file('undangan')->storeAs(
                'document', $request->file('undangan')->getClientOriginalName()
            );
            $payloadData['undangan'] = $uploadForm;
        }
        $findUndangan->update($payloadData);
        return response()->json($findUndangan);
    }

    public function destroy($id)
    {
        $findUndangan = $this->undanganModel->find($id);
        $findUndangan->delete();
        return response()->json($findUndangan);
    }
}