<?php

namespace App\Http\Controllers\CommandCenter;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommandCenter\KategoriLingkupResource;
use App\Models\CommandCenter\KategoriLingkup;
use Illuminate\Http\Request;

class KategoriLingkupController extends Controller
{
    private $kategoriLingkupModel;
    public function __construct()
    {
        $this->kategoriLingkupModel = new KategoriLingkup();
    }


    public function index(){
        $getAllKategoriLingkup = $this->kategoriLingkupModel->get(); // select * from kategorilingkups;

        return KategoriLingkupResource::collection($getAllKategoriLingkup);
    }

    public function store(Request $request){
        $createNewKategoriLingkup = $this->kategoriLingkupModel->create([
            'kategorilingkup_name' => $request->kategorilingkup_name,
            'description' => $request->description
        ]);
        return response()->json($createNewKategoriLingkup);
    }

    public function show($id){
        $findKategoriLingkup = $this->kategoriLingkupModel->find($id);
        return new KategoriLingkupResource($findKategoriLingkup);
    }

    public function update($id,Request $request){
        $findKategoriLingkup = $this->kategoriLingkupModel->find($id);
        $findKategoriLingkup->update([
            'kategorilingkup_name' => $request->kategorilingkup_name,
            'description' => $request->description
        ]);
        return response()->json($findKategoriLingkup);
    }

    public function destroy($id){
        $findKategoriLingkup = $this->kategoriLingkupModel->find($id);
        $findKategoriLingkup->delete();
        return response()->json($findKategoriLingkup);
    }
}
