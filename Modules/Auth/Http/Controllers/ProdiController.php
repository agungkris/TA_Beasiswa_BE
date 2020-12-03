<?php

namespace Modules\Auth\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Modules\Auth\Entities\Prodi;

class ProdiController extends Controller
{
    private $prodiModel;
    public function __construct()
    {
        $this->prodiModel = new Prodi();
    }

    public function index()
    {
        $getAllProdi = $this->prodiModel->get(); // select * from Prodis;
        return response()->json($getAllProdi);
    }

    public function store(Request $request)
    {
        $createNewProdi = $this->prodiModel->create([
            'name' => $request->name,
        ]);
        return response()->json($createNewProdi);
    }

    public function show($id)
    {
        $findProdi = $this->prodiModel->find($id);
        return response()->json($findProdi);
    }

    public function update($id, Request $request)
    {
        $findProdi = $this->prodiModel->find($id);
        $findProdi->update([
            'name' => $request->name,
        ]);
        return response()->json($findProdi);
    }

    public function destroy($id)
    {
        $findProdi = $this->prodiModel->find($id);
        $findProdi->delete();
        return response()->json($findProdi);
    }
}
