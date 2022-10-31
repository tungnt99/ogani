<?php

namespace App\Http\Controllers\Admin;
use DB;
use Illuminate\Routing\Route;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blogs;
use Illuminate\Support\Facades\Auth;
use Hash;

class BlogController extends Controller
{
    public function blog() {
        $blogs = DB::table('blogs')->select('id','title', 'thumbnail', 'description')->get();
       return view('frontend.pages.blog')->with([
        'blogs' => $blogs
       ]);
    }
    public function blogdetail() {
        return view('frontend.pages.blog-detail');
    }
    public function index(Request $request){
        $blogs = DB::table('blogs')->select('id','title', 'thumbnail', 'description')->get();
       return view('backend.blog.index')->with([
        'blogs' => $blogs
       ]);
    }
    public function create(Request $request){
        return view('backend.blog.add-blog');
    }
    public function store(Request $request){
        $blogs = new Blogs($request->except(['thumbnail']));

        if($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid()){
            $blogs->addMediaFromRequest('thumbnail')->toMediaCollection('thumbnail');
        }
         

        $blogs->title = $request->title;
        $blogs->thumbnail = $request->thumbnail;
        $blogs->description = $request->description;
        $blogs->save();

        return redirect()->route('blog.index');
    }
}
