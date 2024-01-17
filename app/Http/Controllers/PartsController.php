<?php

namespace App\Http\Controllers;

use App\Models\parts;
use Illuminate\Http\Request;

class PartsController extends Controller
{
    public function index(){
        $parts = response()->json(parts::all());
        return $parts;
    }

    public function show($id){
        $parts = response()->json(parts::find($id));
        return $parts;
    }

    public function store(Request $request){
        $parts = new parts();
        $parts->name = $request->name;
        $parts->save();
    }

    public function update(Request $request, $id){
        $parts = parts::find($id);
        $parts->name = $request->name;
        $parts->save();
    }

    public function destroy($id){
        parts::find($id)->delete();
    }
}
