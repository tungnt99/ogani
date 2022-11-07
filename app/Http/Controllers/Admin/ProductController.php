<?php
// namespace App\Http\Controllers\API;
namespace App\Http\Controllers\Admin;
use DB;
// use Illuminate\Routing\Route;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;
// use Illuminate\Support\Facades\Auth;
// use Hash;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index(Request $request){
        $products = DB::select('SELECT * FROM products');


       return view('backend.product.index')->with('products', $products);
        
    }
    public function create(Request $request){
        $categories = DB::table('categories')->select('id', 'name')->get();
        return view('backend.product.add-product')->with([
            'categories' => $categories
        ]);
    }
    public function store(Request $request){
        
        if($request->hasFile("cover")){
            $file = $request->file("cover");
            $imageName=time().'_'.$file->getClientOriginalName();
            $file->move(\public_path("cover/"),$imageName);
            
            $products =new Products([
                "title" =>$request->title,
                "price" =>$request->price,
                "discount" =>$request->body,
                "description" =>$request->description,
                "category" =>$request->get('category'),
                "cover" =>$imageName,
            ]);
           $products->save();
        }
    }
}
