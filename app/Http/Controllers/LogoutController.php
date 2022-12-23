<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json(['message' => 'Is logout successfully']);
    }
}
