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
    public function login(){
        // return ("ABC");
        return view('backend.login');
    }
    public function loginAdmin(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $auth = array(
            'email' =>$request->get('email'),
            'password' => $request->get('password'),
        );
        if(Auth::attempt($auth) && Auth::User()->role_name === 'admin'){
            return redirect()->route('backend.dashboard');

        } else{
            return back()->with('status','Invalid login details');
        }
    }

    public function logout() {
        if(Auth::logout())
        {
            return redirect()->route('backend.login');
        }
        return redirect()->route('admin.index');
    }

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
