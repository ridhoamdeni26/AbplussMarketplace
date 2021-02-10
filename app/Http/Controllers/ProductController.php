<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use DB;

class ProductController extends Controller
{
    public function ProductView($id,$product_name){
        $product = DB::table('products')
                    ->join('categories','products.category_id','categories.id')
                    ->join('subcategories','products.subcategory_id','subcategories.id')
                    ->join('durations','products.duration_id','durations.id')
                    ->join('brands','products.brand_id','brands.id')
                    ->select('products.*','categories.category_name','subcategories.subcategory_name','brands.brand_name','durations.time_duration')
                    ->where('products.id',$id)
                    ->first();
        
        // $color = $product ->product_color;
        // $product_color = explode(',', $color);
        // $size = $product ->product_size;
        // $product_size = explode(',', $size);
        return view('pages.product_detail',compact('product'));
    }

    public function AddCart(Request $request, $id){
        $product = DB::table('products')->where('id',$id)->first();
        $imageCart = $product->image_one;
        $bytes = random_bytes(6);
        $serial = bin2hex($bytes);

        if ($product->discount_price == NULL) {
            Cart::add(array(
                'id' => $product->id,
                'name' => $product->product_name,
                'qty' => $request->qty,
                'price' => str_replace(".", "", $product->selling_price),
                'weight' => 1,
                'options' => array(
                    'image' => $imageCart,
                    'duration' =>  $request->duration,
                    'serial' => $serial
                ),
            ));
            $notification=array(
                'messege'=>'Product Successfully Added',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }else{
            Cart::add(array(
                'id' => $product->id,
                'name' => $product->product_name,
                'qty' => $request->qty,
                'price' => str_replace(".", "", $product->discount_price),
                'weight' => 1,
                'options' => array(
                    'image' => $imageCart,
                    'duration' => $request->duration,
                    'serial' => $serial
                ),
            ));
            $notification=array(
                'messege'=>'Product Successfully Added',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function ProductViewPages($id)
    {
        $subcatename = DB::table('subcategories')->where('id',$id)->get();

        $products = DB::table('products')->where('subcategory_id',$id)->paginate(10);
        $categories = DB::table('categories')->get();
        // $brands = DB::table('products')->where('subcategory_id',$id)->select('brand_id')->groupBy('brand_id')->get();
        return view('pages.all_products',compact('products','categories'));
    }

    public function CategoryView($id)
    {
        $category_all = DB::table('products')->where('category_id',$id)->paginate(10);
        return view('pages.all_category',compact('category_all'));
    }
}
