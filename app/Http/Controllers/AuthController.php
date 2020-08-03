<?php

namespace App\Http\Controllers;

use App\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function loginToken(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $createUserToken = $user->createToken('loginToken');
        // return response()->json([
            // 'id' => $createUserToken->accessToken->id,
            // 'access_token' => $createUserToken->accessToken->token
        // ]);

        return $createUserToken->plainTextToken;
    }

    public function getUser(Request $request){
        return $request->user();
    }

    public function logoutToken(Request $request){
        $header = $request->header('Authorization');
        $getBearer = explode(' ',$header)[1];
        $tokenId = explode('|',$getBearer)[0];
        // dd($tokenId);
        $revokeToken = auth()->user()->tokens()->where('id',$tokenId)->delete();
        return $revokeToken;
        // return auth()->user()->tokens()->where('id',$tokenId)->delete();
    }

    public function register(Request $request){
        $registerUser = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return response()->json(['data' => $registerUser]);
    }
}
