<?php
namespace App\Http\Controllers\API;
namespace App\Http\Controllers\Admin;
use DB;
use Illuminate\Routing\Route;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banners;
use Illuminate\Support\Facades\Auth;
use Hash;

class BannerController extends Controller
{
    public function home(Request $request){
        $banners = DB::table('banners')->select('id','title', 'thumbnail', 'description', 'updated_at')->get();
        return view('frontend.pages.home')->with([
            'banners' => $banners,
        ]);

       
    }
  
    public function index(Request $request){
        $banners = DB::table('banners')->select('id','title', 'thumbnail', 'description', 'updated_at')->get();
       return view('backend.banner.index')->with([
        'banners' => $banners
       ]);
    }
    public function create(Request $request){
        return view('backend.banner.add-banner');
    }
    public function store(Request $request){
        $banner = new Banners;
        $banner->title = $request->input('title');
        $banner->description = $request->description;
    
        if($request->hasfile('thumbnail')){
            $file = $request->file('thumbnail');
            $extension = $file->getClientOriginalExtension();
            $file_image = time().'.'.$extension;
            $file->move('uploads/banners/', $file_image);
            $banner->thumbnail = $file_image;
        }
       
        $banner->save();
        
        return redirect()->route('banner.index')->with('success', 'Thêm bài viết mới');
    }
    public function deleteBanner(Request $request){
        DB::table('banners')->where('id', $request->id)->delete();
    }   
        

    public function updateBanner(Request $request){
        $banners = Banners::all();
        $id = $request->id;
        $title = $request->title;
        $description = $request->description;
        if($request->hasfile('thumbnail')){
            $file = $request->file('thumbnail');
            $extension = $file->getClientOriginalExtension();
            $file_image = time().'.'.$extension;
            $file->move('uploads/banners/', $file_image);
            $thumbnail = $file_image;
        }
        if($id > 0){
          $banners = DB::table('banners')->where('id', $id)
          ->update([
            'title' => $title,
            'description' => $description,
            'thumbnail' => $file_image
          ]);
        }
        return redirect('/admin/banner');
    }

    public function editBanner(Request $request){
        $id = 0;
        $title = $description ='';
      
        if(isset($request->id) && $request->id > 0){
          $id = $request->id;
          $std = DB::table('banners')
              ->where('id', $id)
              ->get();
              if($std != null && count($std) > 0){
                  $title = $std[0]->title;
                  $description = $std[0]->description;
                  $thumbnail = $std[0]->thumbnail;
              }
        }
        return view('backend.banner.edit-banner')->with([
            'id' => $id,
            'title' => $title,
            'description' => $description,
        ]);
    }
}
