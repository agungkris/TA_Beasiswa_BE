<?php

namespace Modules\Graduation\Http\Controllers;

// use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Modules\Graduation\Entities\GraduationTema;

class GraduationTemaController extends Controller
{
    private $temaModel;
    public function __construct()
    {
        $this->temaModel = new GraduationTema();
    }


    public function index()
    {
        $getAllTema = $this->temaModel->with('tahun')->get()->map(function($value){ // select * from Tema;
        return [
            'id' => $value->id,
            'tema' => $value->tema,
            'tema_image' => asset('upload/'.$value->tema_image),
            'deskripsi' => $value->deskripsi,
            'tahun_id' => $value->tahun_id,
            'tahun' => $value->tahun
        ];
    });
        return response()->json($getAllTema);
    }

    public function store(Request $request)
    {
        $payloadData = [
            'tema' => $request->tema,
            'tema_image' => $request->tema_image,
            'deskripsi' => $request->deskripsi,
            'tahun_id' => $request->tahun_id,
        ];
        if ($request->file('tema_image')) {
            $uploadForm = $request->file('tema_image')->store('document');
            $payloadData['tema_image'] = $uploadForm;
        }
        $createNewTema = $this->temaModel->create($payloadData);
        return response()->json($createNewTema);
    }

    public function show($id)
    {
        $findTema = $this->temaModel->with('tahun')->find($id);
        $findTema->tema_image = asset('upload/'.$findTema->tema_image);
        return response()->json($findTema);
    }

    public function update($id, Request $request)
    {
        $findTema = $this->temaModel->find($id);
        $payloadData = [
            'tema' => $request->tema,
            'tema_image' => $request->tema_image,
            'deskripsi' => $request->deskripsi,
            'tahun_id' => $request->tahun_id,
        ];
        if ($request->file('tema_image')) {
            if ($findTema && Storage::exists($findTema->tema_image)) {
                Storage::delete($findTema->tema_image);
            }
            $uploadForm = $request->file('tema_image')->store('document');
            $payloadData['tema_image'] = $uploadForm;
        }
        $findTema->update($payloadData);
        return response()->json($findTema);
    }

    public function destroy($id)
    {
        $findTema = $this->temaModel->find($id);
        $findTema->delete();
        return response()->json($findTema);
    }
}
