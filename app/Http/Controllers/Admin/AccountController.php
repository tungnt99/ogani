<?php

namespace App\Http\Controllers\Admin;
use DB;
use Illuminate\Routing\Route;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class AccountController extends Controller
{
      public function index(Request $request){
        $users = DB::table('users')->select('id','name', 'email', 'phone_number', 'address')->get();
        return view('backend.account.index')->with([
          'users' => $users
        ]);
      }
        
      public function deleteUser(Request $request){
        DB::table('users')->where('id', $request->id)->delete();
      }
}
