<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerCategory extends Controller
{
    public function index()
    {
        $category = DB::table('category')->first();
        return response()->json(['data' => $category]);
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string',
        ]);
        $category = new category([
            'name' => $request->name,
        ]);
        $category->save();
        return response()->json(['message' => 'Data Is added !!']);
    }
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category = DB::table('category')->where('id', $id)->get();
        return response()->json(['data' => $category]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        DB::table('category')->where('id', $id)->update([
            'name' => $request->name,
        ]);
        return response()->json(['message' => 'your info is update']);
    }

    public function destroy($id)
    {
        $category = DB::table('category')->where('id', $id)->delete();
        return response()->json(['message' => 'your info is delete!!']);
    }
}
