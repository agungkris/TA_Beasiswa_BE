<?php

namespace Modules\Auth\Http\Controllers;

use App\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function loginToken(Request $request)
    {
        $checkValidation = validator($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($checkValidation->fails()) {
            return response()->json(['errors' => $checkValidation->errors()], 422);
        }

        $user = User::where('username', $request->username)->orWhere('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'username' => ['The provided credentials are incorrect.'],
            ]);
        }

        $createUserToken = $user->createToken('loginToken');
        return response()->json([
            'user' => $user,
            'token' => $createUserToken->plainTextToken
            // 'token' => $createUserToken->accessToken->id
            // 'access_token' => $createUserToken->accessToken->token
        ]);

        // return $createUserToken->plainTextToken;
    }

    public function getUser(Request $request)
    {
        // $findUser = 
        $user = $request->user();
        return response()->json([
            'user' => $user,
            'token' => $user->tokens()->orderBy('id', 'desc')->first()
        ]);
        // return 

    }

    public function logoutToken(Request $request)
    {
        $header = $request->header('Authorization');
        $getBearer = explode(' ', $header)[1];
        $tokenId = explode('|', $getBearer)[0];
        // dd($tokenId);
        $revokeToken = auth()->user()->tokens()->where('id', $tokenId)->delete();
        return $revokeToken;
        // return auth()->user()->tokens()->where('id',$tokenId)->delete();
    }

    public function register(Request $request)
    {
        $registerUser = User::create([
            'level' => $request->level ?? 'student',
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return response()->json(['data' => $registerUser]);
    }
}
