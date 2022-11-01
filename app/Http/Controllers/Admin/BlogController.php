<?php
namespace App\Http\Controllers\API;
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
        $blogs = DB::table('blogs')->select('id','title', 'thumbnail', 'description', 'updated_at')->get();
       return view('backend.blog.index')->with([
        'blogs' => $blogs
       ]);
    }
    public function create(Request $request){
        return view('backend.blog.add-blog');
    }
    public function store(Request $request){
        $blog = new Blogs;
        $blog->title = $request->input('title');
        $blog->description = $request->description;
    
        if($request->hasfile('thumbnail')){
            $file = $request->file('thumbnail');
            $extension = $file->getClientOriginalExtension();
            $file_image = time().'.'.$extension;
            $file->move('uploads/blogs/', $file_image);
            $blog->thumbnail = $file_image;
        }
       
        $blog->save();
        
        // return redirect()->back()->with('status', 'Blog Image Added Successfully');
        return redirect()->route('blog.index')->with('success', 'Thêm bài viết mới');
    }
    public function deleteBlog(Request $request){
        DB::table('blogs')->where('id', $request->id)->delete();
    }   
        

      public function updateBlog(Request $request){
        $blogs = Blogs::all();
        $id = $request->id;
        $title = $request->title;
        $description = $request->description;
        if($id > 0){
          $blogs = DB::table('blogs')->where('id', $id)
          ->update([
            'title' => $title,
            'description' => $description
          ]);
        }
        return redirect('/admin/blog');
    }

    public function editBlog(Request $request){
        $id = 0;
        $title = $description ='';
        if(isset($request->id) && $request->id > 0){
          $id = $request->id;
          $std = DB::table('blogs')
              ->where('id', $id)
              ->get();
              if($std != null && count($std) > 0){
                  $title = $std[0]->title;
                  $description = $std[0]->description;
              }
        }
        return view('backend.blog.edit-blog')->with([
            'id' => $id,
            'title' => $title,
            'description' => $description
        ]);
    }
  
}
