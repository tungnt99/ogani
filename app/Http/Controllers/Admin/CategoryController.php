<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // $data = Category::orderBy('created_at','DESC')->paginate(2);
        return view('backend.category.index');
    }
}
