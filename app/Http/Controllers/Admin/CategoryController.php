<?php

namespace App\Http\Controllers\Admin;
use DB;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request){
        $category = DB::table('category')->select('id','name')->get();
        return view('backend.category.index')->with([
          'category' => $category
        ]);
    }
    public function create(){
        return view('backend.category.add-category');
    }
}
