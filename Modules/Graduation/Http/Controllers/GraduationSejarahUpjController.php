<?php

namespace Modules\Graduation\Http\Controllers;

//use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Graduation\Entities\GraduationSejarahUpj;

class GraduationSejarahUpjController extends Controller
{
    private $sejarahUpjModel;
    public function __construct()
    {
        $this->sejarahUpjModel = new GraduationSejarahUpj();
    }


    public function index()
    {
        $getAllSejarahUpj = $this->sejarahUpjModel->get(); // select * from SejarahUpjs;
        return response()->json($getAllSejarahUpj);
    }

    public function store(Request $request)
    {
        $createNewSejarahUpj = $this->sejarahUpjModel->create([
            'subbab' => $request->subbab,
            'text_sejarah' => $request->text_sejarah,
        ]);
        return response()->json($createNewSejarahUpj);
    }

    public function show($id)
    {
        $findSejarahUpj = $this->sejarahUpjModel->find($id);
        return response()->json($findSejarahUpj);
    }

    public function update($id, Request $request)
    {
        $findSejarahUpj = $this->sejarahUpjModel->find($id);
        $findSejarahUpj->update([
            'subbab' => $request->subbab,
            'text_sejarah' => $request->text_sejarah,
        ]);
        return response()->json($findSejarahUpj);
    }

    public function destroy($id)
    {
        $findSejarahUpj = $this->sejarahUpjModel->find($id);
        $findSejarahUpj->delete();
        return response()->json($findSejarahUpj);
    }
}
