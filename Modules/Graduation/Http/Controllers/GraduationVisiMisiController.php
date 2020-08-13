<?php

namespace Modules\Graduation\Http\Controllers;

//use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Graduation\Entities\GraduationVisiMisi;

class GraduationVisiMisiController extends Controller
{
    private $visiMisiModel;
    public function __construct()
    {
        $this->visiMisiModel = new GraduationVisiMisi();
    }


    public function index()
    {
        $getAllVisiMisi = $this->visiMisiModel->with('tahun')->get(); // select * from Sponsorships;
        return response()->json($getAllVisiMisi);
    }

    public function store(Request $request)
    {
        $createNewVisiMisi = $this->visiMisiModel->create([
            'title' => $request->title,
            'text' => $request->text,
        ]);
        return response()->json($createNewVisiMisi);
    }

    public function show($id)
    {
        $findVisiMisi = $this->visiMisiModel->find($id);
        return response()->json($findVisiMisi);
    }

    public function update($id, Request $request)
    {
        $findVisiMisi = $this->visiMisiModel->find($id);
        $findVisiMisi->update([
            'title' => $request->title,
            'text' => $request->text,
        ]);
        return response()->json($findVisiMisi);
    }

    public function destroy($id)
    {
        $findVisiMisi = $this->visiMisiModel->find($id);
        $findVisiMisi->delete();
        return response()->json($findVisiMisi);
    }
}