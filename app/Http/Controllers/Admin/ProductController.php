<?php
namespace App\Http\Controllers\API;
namespace App\Http\Controllers\Admin;
use DB;
use Illuminate\Routing\Route;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categories;
use Illuminate\Support\Facades\Auth;
use Hash;
class ProductController extends Controller
{
    public function index(Request $request){
        // $blogs = DB::table('blogs')->select('id','title', 'thumbnail', 'description', 'updated_at')->get();
       return view('backend.product.index');
        
    }
    public function create(Request $request){
        $categories = DB::table('categories')->select('id', 'name')->get();
        return view('backend.product.add-product')->with([
            'categories' => $categories
        ]);
    }
}
