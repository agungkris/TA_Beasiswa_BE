<?php

namespace Modules\Graduation\Http\Controllers;

//use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Graduation\Entities\GraduationLaguUpj;

class GraduationLaguUpjController extends Controller
{
    private $homeLaguUpj;
    public function __construct()
    {
        $this->homeLaguUpj = new GraduationLaguUpj();
    }


    public function index()
    {
        $getAllLaguUpj = $this->homeLaguUpj->get(); // select * from LaguUpj;
        return response()->json($getAllLaguUpj);
    }

    public function store(Request $request)
    {
        $createNewLaguUpj = $this->homeLaguUpj->create([
            'image' => $request->image,
        ]);
        return response()->json($createNewLaguUpj);
    }

    public function show($id)
    {
        $findLaguUpj = $this->homeLaguUpj->find($id);
        return response()->json($findLaguUpj);
    }

    public function update($id, Request $request)
    {
        $findLaguUpj = $this->homeLaguUpj->find($id);
        $findLaguUpj->update([
            'image' => $request->image,
        ]);
        return response()->json($findLaguUpj);
    }

    public function destroy($id)
    {
        $findHomeGalley = $this->homeLaguUpj->find($id);
        $findHomeGalley->delete();
        return response()->json($findHomeGalley);
    }
}
