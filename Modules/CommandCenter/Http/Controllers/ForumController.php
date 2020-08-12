<?php

namespace Modules\CommandCenter\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\CommandCenter\Entities\Forum;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    private $forumModel;
    public function __construct()
    {
        $this->forumModel = new Forum();
    }

    public function index()
    {
        $getAllForum = $this->forumModel->with('generation')->get(); // select * from periods;
        return response()->json($getAllForum);
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
        $createNewForum = $this->forumModel->create([
            'generation_id' => $request->generation_id,
            'message' => $request->message,
        ]);
        return response()->json($createNewForum);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $findForum = $this->forumModel->find($id);
        return response()->json($findForum);
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
        $findForum = $this->forumModel->find($id);
        $findForum->update([
            'generation_id' => $request->generation_id,
            'message' => $request->message,
        ]);
        return response()->json($findForum);
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
