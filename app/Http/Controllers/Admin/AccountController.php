<?php

namespace App\Http\Controllers\Admin;
use DB;
use Illuminate\Routing\Route;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\User;
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
      public function updateUser(Request $request){
        $users = User::all();
        $id = $request->id;
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $phone_number = $request->phone_number;
        $address = $request->address;
        if($id > 0){
          $user = DB::table('users')->where('id', $id)
          ->update([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'phone_number' => $phone_number,
            'address' => $address
          ]);
        }else{
          $user = DB::table('users')->insert([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'phone_number' => $phone_number,
            'address' => $address
          ]);
        }
        
        return redirect('/admin/account');
      }

      public function editUser(Request $request){
        $id = 0;
        $name = $email = $password = $phone_number = $address = '';
        if(isset($request->id) && $request->id > 0){
          $id = $request->id;
          $std = DB::table('users')
              ->where('id', $id)
              ->get();
              if($std != null && count($std) > 0){
                  $name = $std[0]->name;
                  $email = $std[0]->email;
                  $password = $std[0]->password;
                  $phone_number = $std[0]->phone_number;
                  $address = $std[0]->address;
              }
      }
      return view('backend.account.edit-user')->with([
          'id' => $id,
          'name' => $name,
          'email' => $email,
          'password' => $password,
          'phone_number' => $phone_number,
          'address' => $address,
      ]);
        // return view('backend.account.edit-user');
      }
}
