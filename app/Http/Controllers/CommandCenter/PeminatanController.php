<?php

namespace App\Http\Controllers\CommandCenter;

use App\Peminatan;
use Illuminate\Http\Request;

class PeminatanController extends Controller
{
    private $peminatanModel;
    public function __construct()
    {
        $this->peminatanModel = new Peminatan();
    }


    public function index(){
        $getAllPeminatan = $this->peminatanModel->get(); // select * from peminatans;
        return response()->json($getAllPeminatan);
    }

    public function store(Request $request){
        $createNewPeminatan = $this->peminatanModel->create([
            'peminatan_name' => $request->peminatan_name,
            'description' => $request->description
        ]);
        return response()->json($createNewPeminatan);
    }

    public function show($id){
        $findPeminatan = $this->peminatanModel->find($id);
        return response()->json($findPeminatan);
    }

    public function update($id,Request $request){
        $findPeminatan = $this->peminatanModel->find($id);
        $findPeminatan->update([
            'peminatan_name' => $request->peminatan_name,
            'description' => $request->description
        ]);
        return response()->json($findPeminatan);
    }

    public function destroy($id){
        $findPeminatan = $this->peminatanModel->find($id);
        $findPeminatan->delete();
        return response()->json($findPeminatan);
    }
}
