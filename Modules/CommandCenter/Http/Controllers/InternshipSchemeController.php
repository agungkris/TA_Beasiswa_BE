<?php

namespace Modules\CommandCenter\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\CommandCenter\Entities\InternshipScheme;

class InternshipSchemeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    private $internshipschemeModel;
    public function __construct()
    {
        $this->internshipschemeModel = new InternshipScheme();
    }

    public function index()
    {
        $getAllInternshipScheme = $this->internshipschemeModel->get(); // select * from periods;
        return response()->json($getAllInternshipScheme);
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
        $createNewInternshipScheme = $this->internshipschemeModel->create([
            'internship_scheme_name' => $request->internship_scheme_name,
        ]);
        return response()->json($createNewInternshipScheme);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $findInternshipScheme = $this->internshipschemeModel->find($id);
        return response()->json($findInternshipScheme);
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
        $findInternshipScheme = $this->internshipschemeModel->find($id);
        $findInternshipScheme->update([
            'internship_scheme_name' => $request->internship_scheme_name,
        ]);
        return response()->json($findInternshipScheme);
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
