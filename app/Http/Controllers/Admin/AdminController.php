<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    public function dashboard() {
        return view('backend.dashboard');
    }
    // login
    // public function loginAdmin(){
    //     // return ("ABC");
    //     return view('backend.loginAdmin');
    // }
    // public function loginAccountAdmin(Request $request){
    //     $this->validate($request,[
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);
    //     if(Auth::attempt($request->only('email', 'password'),false)){
    //         return redirect()->route('home.index');
    //     } else{
    //         return back()->with('status','Invalid login details');
    //     }
    // }

    // public function logout() {
    //     if(Auth::logout())
    //     {
    //         return redirect()->route('backend.loginAdmin');
    //     }
    //     return redirect()->route('admin.index');
    // }

    // public function register(){
    //     return view('backend.register');

    // }
    // public function addAccount(Request $request){
    //     user::create([
    //         'name'=>$request->name,
    //         'email'=>$request->email,
    //         'password'=>bcrypt($request->password),
    //         'phone_number'=>$request->phone_number
    //     ]);
    //     return redirect('login');
    //  }
}
