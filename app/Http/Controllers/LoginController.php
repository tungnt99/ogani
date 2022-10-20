<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
class LoginController extends Controller
{
    public function login(){
        return view('layouts.login');
    }
    public function loginAccount(Request $request){
        dd($request->all());
        dd(Auth::attempt($request->only('email', 'password')));
        if(Auth::attempt($request->only('email', 'password'))){
            return redirect()->route('master');
        }
        else{
            return redirect()->back();
        }
    }
    public function register(){
        return view('layouts.app');

    }

     public function addAccount(Request $request){
        user::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'phone_number'=>$request->phone_number
        ]);
        return redirect('login');
     }
}
