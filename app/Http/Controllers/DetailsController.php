<?php

namespace App\Http\Controllers;

class DetailsController extends Controller
{
    public function __invoke()
    {
        $user = Auth('api')->user();
        return response()->json(['data' => $user]);
    }
}
