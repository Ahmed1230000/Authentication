<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required|string',
        ]);
        $person = request(['email', 'password']);
        if (!Auth::attempt($person)) {
            return response()->json(['message' => 'The Login Is not Exists'], 401);
        }
        $user = $request->user();
        $token_user = $user->createToken('Personal Access Token');
        return response()->json(['data' => [
            'user'         => Auth::user(),
            'access_Token' => $token_user->accessToken,
            'token_type'   => 'Bearer',
            'expites_at'   => Carbon::parse($token_user->token->expires_at)->toDateTimeString(),
        ]]);
    }
}
