<?php

namespace App\Http\Controllers;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(){
        return view('layouts.app');
    }
    public function addAccount(Request $request){
        $id = $request->id;
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $phone_number = $request->phone_number;
        DB::table('users')->insert([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'phone_number' => $phone_number,
        ]);
        return redirect('/login');
    }
}
