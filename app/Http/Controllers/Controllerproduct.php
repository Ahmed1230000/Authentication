<?php

namespace App\Http\Controllers;

use App\Models\prodect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Controllerproduct extends Controller
{
    public function index()
    {
        $product = DB::table('product')->first();
        return response()->json(['data' => $product]);
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
        $product = new prodect([
            'name' => $request->name,
            'user_id' => auth('api')->user()->id,
            'category_id' => $request->category_id,
        ]);
        $product->save();
        return response()->json(['message' => 'data is added'], 200);
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $product = DB::table('product')->where('id', $id)->get();
        return response()->json(['data' => $product]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        DB::table('product')->where('id', $id)->update([
            'name' => $request->name,
        ]);
        return response()->json(['message' => 'all data is update']);
    }
    public function destroy($id)
    {
        DB::table('product')->where('id', $id)->delete();
        return response()->json(['message' => 'your info is delete!!']);
    }
}
