<?php

namespace Modules\CommandCenter\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Modules\CommandCenter\Entities\ResearchCopyright;

class ResearchCopyrightController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    private $researchcopyrightModel;
    public function __construct()
    {
        $this->researchcopyrightModel = new ResearchCopyright();
    }

    public function index()
    {
        $getAllResearchCopyright = $this->researchcopyrightModel->with(['copyright_category','periods','scope_category'])->get()->map(function ($value) {
            $data = [
                'id' => $value->id,
                'copyright_category_id' => $value->copyright_category_id,
                'periods_id' => $value->periods_id,
                'scope_category_id' => $value->scope_category_id,
                'copyright_file' => asset('upload/' . $value->copyright_file),
                'description' => $value->description,
                'copyright_category' => $value->copyright_category,
                'periods' => $value->periods,
                'scope_category' => $value->scope_category
            ];
            return $data;
        }); // select * from periods;
        return response()->json($getAllResearchCopyright);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $payloadData = [
            'copyright_category_id' => $request->copyright_category_id,
            'periods_id' => $request->periods_id,
            'scope_category_id' => $request->scope_category_id,
            'description' => $request->description,
        ];
        if ($request->file('copyright_file')) {
            $uploadForm = $request->file('copyright_file')->store('document');
            $payloadData['copyright_file'] = $uploadForm;
        }
        $createNewResearchCopyright = $this->researchcopyrightModel->create($payloadData);
        return response()->json($createNewResearchCopyright);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $findResearchCopyright = $this->researchcopyrightModel->find($id);
        return response()->json($findResearchCopyright);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('commandcenter::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update($id, Request $request)
    {
        $findResearchCopyright = $this->researchcopyrightModel->find($id);
        $payloadData = [
            'copyright_category_id' => $request->copyright_category_id,
            'periods_id' => $request->periods_id,
            'scope_category_id' => $request->scope_category_id,
            'description' => $request->description,
        ];
        if($request->file('copyright_file')){
            if(Storage::exists($findResearchCopyright->copyright_file)){
                Storage::delete(($findResearchCopyright->copyright_file));

                
                
            }
            $uploadForm = $request->file('copyright_file')->store('document');
            $payloadData['copyright_file'] = $uploadForm;

        }
        $findResearchCopyright->update($payloadData);
        return response()->json($findResearchCopyright);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
