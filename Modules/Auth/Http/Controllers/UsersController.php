<?php

namespace Modules\Auth\Http\Controllers;

use Modules\Auth\Entities\User;
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
        $userModel = $this->usersModel->with('profile.prodi', 'category_jury');
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
            'prodi_id' => $request->prodi_id,
            'generation' => $request->generation,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        if ($request->level == 'juri') {
            $createNewUsers->category_jury()->create([
                'karya_tulis' => $request->karya_tulis,
                'fgd' => $request->fgd
            ]);
        }
        return response()->json($createNewUsers);
    }

    public function show($id)
    {
        $findUsers = $this->usersModel->with('category_jury', 'profile.prodi')->find($id);
        return response()->json($findUsers);
    }

    public function update($id, Request $request)
    {
        $findUsers = $this->usersModel->find($id);
        $updateUser = $findUsers->update([
            'level' => $request->level,
            'username' => $request->username,
            'prodi_id' => $request->prodi_id,
            'generation' => $request->generation,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        if ($request->level == 'juri') {
            $findUsers->category_jury()->update([
                'karya_tulis' => $request->karya_tulis,
                'fgd' => $request->fgd
            ]);
        }
        return response()->json($findUsers);
    }

    public function submissionMember($id, Request $request)
    {
        $findJurySubmissionMember = $this->usersModel->with('paper_jury.student.profile.prodi')->find($id)->paper_jury()->with('student.profile.prodi')->where('period_id', $request->period_id ?? 1)->get();
        // dd($findJury);
        return response()->json($findJurySubmissionMember);
    }


    public function addSubmissionMember($id, Request $request)
    {
        try {
            $this->usersModel->find($id)->paper_jury()->attach($request->submission_id);
            return response()->json(['message' => 'berhasil']);
            //code...
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function removeSubmissionMember($id, $submissionId)
    {
        try {
            $this->usersModel->find($id)->paper_jury()->detach($submissionId);
            return response()->json(['message' => 'berhasil']);
            //code...
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function destroy($id)
    {
        $findUsers = $this->usersModel->find($id);
        $findUsers->delete();
        return response()->json($findUsers);
    }
}
