<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){ 

        return response()->json(User::all()); 

    } 

 

    public function show($id, $email){ 

        $user =  User::where('id', $id) 

                        ->where('email',"=", $email) 

                        ->get(); 

        return $user[0]; 

    } 



    public function store(Request $request){ 

        $user = new User(); 

        $user->id = $request->id; 

        $user->name = $request->name; 

        $user->email = $request->email; 

        $user->password = $request->password; 

        $user->member = $request->member; 

        

        $user->save(); 

    } 

 

    public function update(Request $request,$id, $email){ 

        $user = $this->show($id, $email); 

        $user->id = $request->id; 

        $user->name = $request->name; 

        $user->email = $request->email; 

        $user->password = $request->password; 

        $user->member = $request->member; 



        $user->save(); 

    } 

 

    public function destroy($id, $email){ 

        $this->show($id, $email)->delete(); 

    } 
}
