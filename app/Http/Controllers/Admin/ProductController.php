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
        $products = new Products();

        $image = $request->file('file');
        $avatarName = $image->getClientOriginalName();
        $image->move(public_path('images'),$avatarName);
        $imageUpload = new Image();
        $imageUpload->image = $avatarName;
        $imageUpload->save();
        return response()->json(['success'=>$avatarName]);
        
        if($request->hasFile("cover")){
            $file = $request->file("cover");
            $imageName=time().'_'.$file->getClientOriginalName();
            $file->move('uploads/cover/',$imageName);
            $products->cover = $imageName;
        }
        // if($request->hasFile("images")){
        //     $files = $request->file("images");
        //     foreach($files as $file){
        //         $imageName=time().'_'.$file->getClientOriginalName();
        //         $request['products_id'] = $products->id;
        //         $request['image'] = $imageName;
        //         $file->move('uploads/images/', $imageName);
        //         Image::create($request->all());
        //     }
        // }
        $products->title = $request->input('title');
        $products->price = $request->input('price');
        $products->discount = $request->input('discount');
        $products->description = $request->input('description');
        $products->category_id = $request->input('category_id');
         
        $products->save();
        return redirect()->route('product.index')->with('success', 'Product Added Successfully');
        
    }
    public function deleteProduct(Request $request){
        DB::table('products')->where('id', $request->id)->delete();
    }   

    public function editProduct(Request $request){
        $categories = DB::table('categories')->select('id', 'name')->get();
        $products = DB::select('SELECT * FROM products');

        $id = 0;
        $title = $price = $discount = $description = $category_id = '';
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

                }
        }
        // dd('asdsd');
        return view('backend.product.edit-product')->with([
            'id' => $id,
            'title' => $title,
            'price' => $price,
            'discount' => $discount,
            'description' => $description,
            'category_id' => $category_id,
            'categories' => $categories,
            'products' => $products
        ]);
    }
    
    public function deleteCover($id){
        $products = DB::select('SELECT * FROM products');

        $cover = Products::findOrFail($id)->cover;
        if(File::exists("cover/".$cover)){
            File::delete("cover/".$cover);
        }
        return back()->with('products', $products);
    }
    public function deleteImage($id){
        $products = DB::select('SELECT * FROM products');

        $images=Image::findOrFail($id);
        if (File::exists("images/".$images->image)) {
           File::delete("images/".$images->image);
       }

       Image::find($id)->delete();
       return back()->with([
        'images'=> $images,
        'products'=> $products
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
        if($id > 0){
            $products = DB::table('products')->where('id', $id)
            ->update([
                'title' => $title,
                'price' => $price,
                'discount' => $discount,
                'description' => $description,
                'category_id' => $category_id
            ]);
        }
        return redirect('/admin/product');
    }
}
