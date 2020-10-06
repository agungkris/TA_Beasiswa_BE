<?php

namespace Modules\Scholarship\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Scholarship\Entities\ScholarshipPaperJury;

class ScholarshipPaperJuryController extends Controller
{
    private $scholarshipPaperJuryModel;
    public function __construct()
    {
        $this->scholarshipPaperJuryModel = new ScholarshipPaperJury();
    }

    public function index(Request $request)
    {
        $getAllPaperJury = $this->scholarshipPaperJuryModel->with('jury', 'submissions')->get();

        return response()->json($getAllPaperJury);
    }

    public function store($id, Request $request)
    {
        $createNewPaperJury = $this->scholarshipPaperJuryModel->updateOrCreate([
            'jury_id' => $request->jury_id,
            'submissions_id' => $request->submissions_id
        ], [
            'jury_id' => $request->jury_id,
            'submissions_id' => $request->submissions_id,
        ]);
        return response()->json($createNewPaperJury);
    }

    public function show($id)
    {
        $findPaperJury = $this->scholarshipPaperJuryModel->find($id);
        return response()->json($findPaperJury);
    }

    public function update($id, Request $request)
    {
        $findPaperJury = $this->scholarshipPaperJuryModel->find($id);
        $findPaperJury->update([
            'jury_id' => $request->jury_id,
            'submissions_id' => $request->submissions_id,
        ]);
        return response()->json($findPaperJury);
    }

    public function destroy($id)
    {
        $findPaperJury = $this->scholarshipPaperJuryModel->find($id);
        $findPaperJury->delete();
        return response()->json($findPaperJury);
    }
}
