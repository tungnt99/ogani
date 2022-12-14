<?php
namespace App\Http\Controllers\Admin;
use DB;
use Illuminate\Routing\Route;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;
use App\Models\Image;

use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index(Request $request){
        $products = Products::with('category')->paginate(10);
        $page = 1;
        if(isset($request->page)){
            $page = $request->page;
        }
        $index = ($page-1)*10;
        return view('backend.product.index')->with([
            'products'=> $products,
            'index'=>$index
        ]);

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
            $file->move('uploads/cover/',$imageName);
            $products = new Products([
                "title" => $request->title,
                "price" => $request->price,
                "discount" => $request->discount,
                "description" => $request->description,
                "category_id" => $request->category_id,
                "cover" => $imageName
            ]);
            $products->save();

        }
        if($request->hasFile("images")){
            $files = $request->file("images");
            foreach($files as $file){
                $imageName=time().'_'.$file->getClientOriginalName();
                $request['products_id'] = $products->id;
                $request['image'] = $imageName;
                $file->move('uploads/images/', $imageName);
                Image::create($request->all());
            }
        }

        return redirect()->back()->with('status', 'Product successfully');


    }
    public function deleteProduct(Request $request){
        DB::table('products')->where('id', $request->id)->delete();
    }

    public function editProduct(Request $request){
        $categories = DB::table('categories')->select('id', 'name')->get();
        $products = DB::select('SELECT * FROM products');

        $id = 0;
        $title = $price = $discount = $description = $category_id = $cover ='';
        if(isset($request->id) && $request->id>0){
            $id = $request->id;
            $std = DB::table('products')
                ->where('id', $id)
                ->get();
                if($std != null && count($std) > 0){
                    $title = $std[0]->title;
                    $price = $std[0]->price;
                    $discount = $std[0]->discount;
                    $description = $std[0]->description;
                    $category_id = $std[0]->category_id;
                    $cover = $std[0]->cover;
                }
        }
        return view('backend.product.edit-product')->with([
            'id' => $id,
            'title' => $title,
            'price' => $price,
            'discount' => $discount,
            'description' => $description,
            'category_id' => $category_id,
            'categories' => $categories,
            'products' => $products,
            'cover' => $cover

        ]);
    }

    public function updateProduct(Request $request){
        $products = Products::all();
        $id = $request->id;
        $title = $request->title;
        $price = $request->price;
        $discount = $request->discount;
        $description = $request->description;
        $category_id = $request->category_id;

       if($request->hasFile("cover")){
        $file = $request->file("cover");
        $imageUpdate = time().'_'.$file->getClientOriginalName();
        $file->move('uploads/cover/', $imageUpdate);
       }
        if($id > 0){
            $products = DB::table('products')->where('id', $id)
            ->update([
                'title' => $title,
                'price' => $price,
                'discount' => $discount,
                'description' => $description,
                'category_id' => $category_id,
                'cover' => $imageUpdate
            ]);
        }
        return redirect('/admin/product');
    }
}
