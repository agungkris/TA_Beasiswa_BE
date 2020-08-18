<?php

namespace Modules\Auth\Http\Controllers;

use App\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UsersController extends Controller
{
    private $usersModel;
    public function __construct()
    {
        $this->usersModel = new User();
    }

    public function index(Request $request)
    {
        $userModel = $this->usersModel;
        // dd($request->level);
        if ($request->level) {
            $userModel = $userModel->where('level', $request->level);
        }
        $getAllUsers = $userModel->get();

        // select * from Users;
        // select * from student_groups inner join period on periode.id = student_groups.period_id;
        return response()->json($getAllUsers);
    }

    public function store(Request $request)
    {
        $userModel = $this->usersModel;
        // dd($request->level);

        $createNewUsers = $userModel->get();

        $createNewUsers = $this->usersModel->create([
            'level' => $request->level ?? 'student',
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);
        return response()->json($createNewUsers);
    }

    public function show($id)
    {
        $findUsers = $this->usersModel->find($id);
        return response()->json($findUsers);
    }

    public function update($id, Request $request)
    {
        $findUsers = $this->usersModel->find($id);
        $findUsers->update([
            'level' => $request->level,
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);
        return response()->json($findUsers);
    }

    public function destroy($id)
    {
        $findUsers = $this->usersModel->find($id);
        $findUsers->delete();
        return response()->json($findUsers);
    }
}
