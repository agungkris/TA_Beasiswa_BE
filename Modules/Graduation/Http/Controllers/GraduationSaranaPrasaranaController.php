<?php

namespace Modules\Graduation\Http\Controllers;

//use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Modules\Graduation\Entities\GraduationSaranaPrasarana;

class GraduationSaranaPrasaranaController extends Controller
{
    private $saranaPrasaranaModel;
    public function __construct()
    {
        $this->saranaPrasaranaModel = new GraduationSaranaPrasarana();
    }


    public function index()
    {
        $getAllSaranaPrasarana = $this->saranaPrasaranaModel->with('tahun')->get()->map(function($value){ // select * from SaranaPrasaranas;
            return [
                'id' => $value->id,
                'image' => asset('upload/'.$value->image),
                'kategori' => $value->kategori,
                'tahun_id' => $value->tahun_id,
                'tahun' => $value->tahun,
            ];
        });
        return response()->json($getAllSaranaPrasarana);
    }

    public function store(Request $request)
    {
        $payloadData =[
            'image' => $request->image,
            'kategori' => $request->kategori,
            'tahun_id' => $request->tahun_id,
        ];
        if ($request->file('image')) {
           
            $uploadForm = $request->file('image')->store('document');
            $payloadData['image'] = $uploadForm;
        }
        $createNewSaranaPrasarana = $this->saranaPrasaranaModel->create($payloadData);
        return response()->json($createNewSaranaPrasarana);
    }

    public function show($id)
    {
        $findSaranaPrasarana = $this->saranaPrasaranaModel->with('tahun')->find($id);
        $findSaranaPrasarana->image = asset('upload/'.$findSaranaPrasarana->image);
        return response()->json($findSaranaPrasarana);
    }

    public function update($id, Request $request)
    {
        $findSaranaPrasarana = $this->saranaPrasaranaModel->find($id);
        $payloadData =[
            'image' => $request->image,
            'kategori' => $request->kategori,
            'tahun_id' => $request->tahun_id,
        ];
        if ($request->file('image')) {
            if ($findSaranaPrasarana && Storage::exists($findSaranaPrasarana->image)) {
                Storage::delete($findSaranaPrasarana->image);
            }
            $uploadForm = $request->file('image')->store('document');
            $payloadData['image'] = $uploadForm;
        }
        $findSaranaPrasarana->update($payloadData);
        return response()->json($findSaranaPrasarana);
    }

    public function destroy($id)
    {
        $findSaranaPrasarana = $this->saranaPrasaranaModel->find($id);
        $findSaranaPrasarana->delete();
        return response()->json($findSaranaPrasarana);
    }
}
