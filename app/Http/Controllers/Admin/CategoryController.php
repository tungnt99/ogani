<?php

namespace App\Http\Controllers\Admin;
use DB;
use Illuminate\Routing\Route;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Facades\Auth;
use Hash;
class CategoryController extends Controller
{
      public function index(Request $request){
        $categories = DB::table('categories')->select('id','name')->get();
        return view('backend.category.index')->with([
          'categories' => $categories
        ]);
      }
    
      public function deleteCategory(Request $request){
        DB::table('categories')->where('id', $request->id)->delete();
      }
      public function updateCategory(Request $request){
        $categories = Categories::all();
        $id = $request->id;
        $name = $request->name;
        if($id > 0){
          $categories = DB::table('categories')->where('id', $id)
          ->update([
            'name' => $name,
          ]);
        }
        return redirect('/admin/category');
      }

      public function editCategory(Request $request){
        $id = 0;
        $name = '';
        if(isset($request->id) && $request->id > 0){
          $id = $request->id;
          $std = DB::table('categories')
              ->where('id', $id)
              ->get();
              if($std != null && count($std) > 0){
                  $name = $std[0]->name;
              }
        }
        return view('backend.category.edit-category')->with([
            'id' => $id,
            'name' => $name,
        ]);
      }
     
      public function create(Request $request){
        return view('backend.category.add-category');
      }

      public function store(Request $request){
        $categories = new Categories;
        $categories->name = $request->name;
        $categories->save();
        return redirect()->route('category.index');
      }
}
