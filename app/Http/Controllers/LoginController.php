<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function login(){
        return view('layouts.login');
    }
    public function loginAccount(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if(Auth::attempt($request->only('email', 'password'),false)){
            return redirect()->route('home.index');
        } else{
            return back()->with('status','Invalid login details');
        }
    }

    public function logout() {
        if(Auth::logout())
        {
            return redirect()->route('home.login');
        }
        return redirect()->route('home.index');
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
