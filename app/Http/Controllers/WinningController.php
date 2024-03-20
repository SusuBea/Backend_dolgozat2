<?php

namespace App\Http\Controllers;

use App\Models\winnings;
use Illuminate\Http\Request;

class WinningController extends Controller
{
    public function index(){ 

        return response()->json(winnings::all()); 

    } 

 

    public function show($user_id, $brand_id, $part_id){ 

        $winning =  winnings::where('user_id', $user_id) 

                        ->where('brand_id',"=", $brand_id) 

                        ->where('part_id',"=", $part_id) 

                        ->get(); 

        return $winning[0]; 

    } 



    public function store(Request $request){ 

        $winning = new winnings(); 

        $winning->user_id = $request->user_id; 

        $winning->brand_id = $request->brand_id; 

        $winning->part_id = $request->part_id; 

        $winning->product_id = $request->product_id; 

        $winning->date = $request->date; 

        

        $winning->save(); 

    } 

 

    public function update(Request $request,$user_id, $brand_id, $part_id){ 

        $item = $this->show($user_id, $brand_id, $part_id); 

        $item->user_id = $request->user_id; 

        $item->brand_id = $request->brand_id; 

        $item->part_id = $request->part_id; 

         

        $item->save(); 

    } 

 

    public function destroy($user_id, $brand_id, $part_id){ 

        $this->show($user_id, $brand_id, $part_id)->delete(); 

    } 

    public function brandWinningAll($brand_id){

       $all =  winnings::with('brandWinningAll')-> where('brand_id', $brand_id)->get();
        return $all;
   } 
}
