<?php

namespace Modules\Graduation\Http\Controllers;

//use Illuminate\Contracts\Support\Renderable;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Modules\Graduation\Entities\GraduationSambutan;

class GraduationSambutanController extends Controller
{
    private $sambutanModel;
    public function __construct()
    {
        $this->sambutanModel = new GraduationSambutan();
    }


    public function index()
    {
        $getAllSambutan = $this->sambutanModel->with('tahun')->get()->map(function($value){
         return [
            'id' => $value->id,
            'nama_lengkap' => $value->nama_lengkap,
            'kategori' => $value->kategori,
            'text_sambutan' => $value->text_sambutan,
            'tanggal' => $value->tanggal,
            'tahun_id' => $value->tahun_id,
            'tahun' => $value->tahun,
            'image' => asset('upload/'.$value->image)
         ];
        }); // select * from sambutans;
        return response()->json($getAllSambutan);
    }

    public function store(Request $request)
    {
        $payloadData =[
            'nama_lengkap' => $request->nama_lengkap,
            'kategori' => $request->kategori,
            'text_sambutan' => $request->text_sambutan,
            'tanggal' => Carbon::parse($request->tanggal)->toDateString(),
            'image' => $request->image,
            'tahun_id' => $request->tahun_id,
        ];
        if ($request->file('image')) {
           
            $uploadForm = $request->file('image')->store('document');
            $payloadData['image'] = $uploadForm;
        }
        $createNewSambutan = $this->sambutanModel->create($payloadData);
        return response()->json($createNewSambutan);
    }

    public function show($id)
    {
        $findSambutan = $this->sambutanModel->with('tahun')->find($id);
        $findSambutan->image = asset('upload/'.$findSambutan->image);
        return response()->json($findSambutan);
    }

    public function update($id, Request $request)
    {
        $findSambutan = $this->sambutanModel->find($id);
        $payloadData =[
            'nama_lengkap' => $request->nama_lengkap,
            'kategori' => $request->kategori,
            'text_sambutan' => $request->text_sambutan,
            'tanggal' => Carbon::parse($request->tanggal)->toDateString(),
            'image' => $request->image,
            'tahun_id' => $request->tahun_id,
        ];
        if ($request->file('image')) {
            if ($findSambutan && Storage::exists($findSambutan->image)) {
                Storage::delete($findSambutan->image);
            }
            $uploadForm = $request->file('image')->store('document');
            $payloadData['image'] = $uploadForm;
        }
        $findSambutan->update($payloadData);
        return response()->json($findSambutan);
    }

    public function destroy($id)
    {
        $findSambutan = $this->sambutanModel->find($id);
        $findSambutan->delete();
        return response()->json($findSambutan);
    }
}
