<?php

namespace Modules\Auth\Http\Controllers;

//use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Auth\Entities\GraduationTahun;

class GraduationTahunController extends Controller
{
    private $tahunModel;
    public function __construct()
    {
        $this->tahunModel = new GraduationTahun();
    }


    public function index()
    {
        $getAllTahun = $this->tahunModel->get(); // select * from Tahun;
        return response()->json($getAllTahun);
    }

    public function store(Request $request)
    {
        $createNewTahun = $this->tahunModel->create([
            'tahun' => $request->tahun,
        ]);
        return response()->json($createNewTahun);
    }

    public function show($id)
    {
        $findTahun = $this->tahunModel->find($id);
        return response()->json($findTahun);
    }

    public function update($id, Request $request)
    {
        $findTahun = $this->tahunModel->find($id);
        $findTahun->update([
            'tahun' => $request->tahun,
        ]);
        return response()->json($findTahun);
    }

    public function destroy($id)
    {
        $findTahun = $this->tahunModel->find($id);
        $findTahun->delete();
        return response()->json($findTahun);
    }
}