<?php

namespace Modules\Scholarship\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Scholarship\Entities\ScholarshipCategoryJury;

class ScholarshipCategoryJuryController extends Controller
{
    private $categoryJuryModel;
    public function __construct()
    {
        $this->categoryJuryModel = new ScholarshipCategoryJury();
    }


    public function index()
    {
        $getAllCategoryJury = $this->categoryJuryModel->get(); // select * from categoryjurys;
        return response()->json($getAllCategoryJury);
    }

    public function store(Request $request)
    {
        $createNewCategoryJury = $this->categoryJuryModel->create([
            'jury_id' => $request->jury_id,
            'karya_tulis' => $request->karya_tulis,
            'fgd' => $request->fgd,
        ]);
        return response()->json($createNewCategoryJury);
    }

    public function show($id)
    {
        $findCategoryJury = $this->categoryJuryModel->find($id);
        return response()->json($findCategoryJury);
    }

    public function update($id, Request $request)
    {
        $findCategoryJury = $this->categoryJuryModel->find($id);
        $findCategoryJury->update([
            'jury_id' => $request->jury_id,
            'karya_tulis' => $request->karya_tulis,
            'fgd' => $request->fgd,
        ]);
        return response()->json($findCategoryJury);
    }

    public function destroy($id)
    {
        $findCategoryJury = $this->categoryJuryModel->find($id);
        $findCategoryJury->delete();
        return response()->json($findCategoryJury);
    }
}
