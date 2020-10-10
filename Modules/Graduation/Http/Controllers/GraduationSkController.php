<?php

namespace Modules\Graduation\Http\Controllers;

//use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Modules\Graduation\Entities\GraduationSk;

class GraduationSkController extends Controller
{
    private $skModel;
    public function __construct()
    {
        $this->skModel = new GraduationSk();
    }


    public function index()
    {
        $getAllSk = $this->skModel->with('tahun')->get()->map(function($value){
            return [
                'id' => $value->id,
                'sk' => asset('upload/'.$value->sk),
                'tahun_id' => $value->tahun_id,
                'tahun' => $value->tahun
            ];
        }); // select * from Sponsorships;
        return response()->json($getAllSk);
    }

    public function store(Request $request)
    {
        $payloadData = [
            'sk' => $request->sk,
            'tahun_id' => $request->tahun_id,
        ];
        if ($request->file('sk')) {
            $uploadForm = $request->file('sk')->storeAs(
                'document', $request->file('sk')->getClientOriginalName()
            );
            $payloadData['sk'] = $uploadForm;
        }
        $createNewSk = $this->skModel->create($payloadData);
        return response()->json($createNewSk);
    }

    public function show($id)
    {
        $findSk = $this->skModel->with('tahun')->find($id);
        $findSk->sk = asset('upload/'.$findSk->sk);
        return response()->json($findSk);
    }

    public function update($id, Request $request)
    {
        $findSk = $this->skModel->find($id);
        $payloadData = [
            'sk' => $request->sk,
            'tahun_id' => $request->tahun_id,
        ];
        if ($request->file('sk')) {
            if ($findSk && Storage::exists($findSk->sk)) {
                Storage::delete($findSk->sk);
            }
            $uploadForm = $request->file('sk')->storeAs(
                'document', $request->file('sk')->getClientOriginalName()
            );
            $payloadData['sk'] = $uploadForm;
        }
        $findSk->update($payloadData);
        return response()->json($findSk);
    }

    public function destroy($id)
    {
        $findSk = $this->skModel->find($id);
        $findSk->delete();
        return response()->json($findSk);
    }
}