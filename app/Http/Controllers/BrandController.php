<?php

namespace App\Http\Controllers;

use App\Models\brands;
use App\Models\winnings;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(){
        $brands = response()->json(brands::all());
        return $brands;
    }

    public function show($id){
        $brand = response()->json(brands::find($id));
        return $brand;
    }

    public function store(Request $request){
        $brand = new brands();
        $brand->name = $request->name;
        $brand->country = $request->country; 

        $brand->save();
    }

    public function update(Request $request, $id){
        $brand = brands::find($id);
        $brand->name = $request->name;
        $brand->country = $request->country; 

        $brand->save();
    }

    public function destroy($id){
        brands::find($id)->delete();
    }

    public function brandWinningAll($brand_id){

        $all =  winnings::with('brandWinningAll')-> where('brand_id', $brand_id)->get();
        return $all;
   }

}
