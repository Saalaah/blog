<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class SigninController extends Controller
{
    public function login(Request $request){
$login=$request->validate([
    'email'=>'required|string',
    'password'=>'required|string'
]);
if(!Auth::attempt($login)){
return response(["message"=>"Invalid Login credentials"]);
}

$accessToken=Auth::user()->createToken('authToken')->accessToken;

return response(['user'=>Auth::user(),'access_token'=>$accessToken]);

}


public function getO(){

    return auth()->user()->id;
}



}
