<?php

namespace App\Http\Controllers;

use App\Models\content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContentController extends Controller
{
    public function index()
    {
        $content = DB::table('content')->where('user_id', Auth('api')->user()->id)->get();
        return response()->json(['data' => $content]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string',
            'email' => 'string',
            'phone' => 'string',
            'message' => 'string',
        ]);
        $content = new content([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
            'user_id' =>  auth('api')->user()->id,
        ]);
        $content->save();
        return response()->json(
            ['message' => 'All Data Added'],
            200
        );
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
