<?php

namespace Modules\Graduation\Http\Controllers;

//use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Graduation\Entities\GraduationJanjiWisudawan;

class GraduationJanjiWisudawanController extends Controller
{
    private $homeJanjiWisudawanModel;
    public function __construct()
    {
        $this->homeJanjiWisudawanModel = new GraduationJanjiWisudawan();
    }


    public function index()
    {
        $getAllJanjiWisudawan = $this->homeJanjiWisudawanModel->get(); // select * from JanjiWisudawan;
        return response()->json($getAllJanjiWisudawan);
    }

    public function store(Request $request)
    {
        $createNewJanjiWisudawan = $this->homeJanjiWisudawanModel->create([
            'text_janji' => $request->text_janji,
            'image' => $request->image,
        ]);
        return response()->json($createNewJanjiWisudawan);
    }

    public function show($id)
    {
        $findJanjiWisudawan = $this->homeJanjiWisudawanModel->find($id);
        return response()->json($findJanjiWisudawan);
    }

    public function update($id, Request $request)
    {
        $findJanjiWisudawan = $this->homeJanjiWisudawanModel->find($id);
        $findJanjiWisudawan->update([
            'text_janji' => $request->text_janji,
            'image' => $request->image,
        ]);
        return response()->json($findJanjiWisudawan);
    }

    public function destroy($id)
    {
        $findJanjiWisudawan = $this->homeJanjiWisudawanModel->find($id);
        $findJanjiWisudawan->delete();
        return response()->json($findJanjiWisudawan);
    }
}
