<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;


class SignupController extends Controller
{
    function create(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
            'email'=>'required|string',
            'password'=>'required',

        ]);
        $user=new User;
        $user->name=$request->input('name');   
        $user->email=$request->input('email');   
        $user->password=Hash::make($request['password']);  
        $user->save();
return response(['message'=>"user made successfully"]);
       
    }
}
