<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = response()->json(products::all());
        return $products;
    }

    public function show($id){
        $product = response()->json(products::find($id));
        return $product;
    }

    public function store(Request $request){
        $product = new products();
        $product->name = $request->name;
        $product->part_id = $request->part_id; 
        $product->brand_id = $request->brand_id; 

        $product->save();
    }

    public function update(Request $request, $id){
        $product = products::find($id);
        $product->name = $request->name;
        $product->part_id = $request->part_id; 
        $product->brand_id = $request->brand_id; 
        $product->save();
    }

    public function destroy($id){
        products::find($id)->delete();
    }
}
