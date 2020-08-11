<?php

namespace Modules\Graduation\Http\Controllers;

//use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
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
        $getAllSaranaPrasarana = $this->saranaPrasaranaModel->get(); // select * from SaranaPrasaranas;
        return response()->json($getAllSaranaPrasarana);
    }

    public function store(Request $request)
    {
        $createNewSaranaPrasarana = $this->saranaPrasaranaModel->create([
            'image' => $request->image,
            'subtitle' => $request->subtitle,
        ]);
        return response()->json($createNewSaranaPrasarana);
    }

    public function show($id)
    {
        $findSaranaPrasarana = $this->saranaPrasaranaModel->find($id);
        return response()->json($findSaranaPrasarana);
    }

    public function update($id, Request $request)
    {
        $findSaranaPrasarana = $this->saranaPrasaranaModel->find($id);
        $findSaranaPrasarana->update([
            'image' => $request->image,
            'subtitle' => $request->subtitle,
        ]);
        return response()->json($findSaranaPrasarana);
    }

    public function destroy($id)
    {
        $findSaranaPrasarana = $this->saranaPrasaranaModel->find($id);
        $findSaranaPrasarana->delete();
        return response()->json($findSaranaPrasarana);
    }
}
