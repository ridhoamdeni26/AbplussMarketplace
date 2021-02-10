<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Response;
use Auth;
use Session;
use Carbon\Carbon;

class CartController extends Controller
{
    public function AddCart($id){
        $product = DB::table('products')
                    ->join('durations','products.duration_id','durations.id')
                    ->select('products.*','durations.time_duration')
                    ->where('products.id',$id)->first();
        $imageCart = $product->image_one;
        $duration = $product->time_duration;

        $bytes = random_bytes(6);
        $serial = bin2hex($bytes);

        if ($product->discount_price == NULL) {
            Cart::add(array(
                'id' => $product->id,
                'name' => $product->product_name,
                'qty' => 1,
                'price' => str_replace(".", "", $product->selling_price),
                'weight' => 1,
                'options' => array(
                    'image' => $imageCart,
                    'duration' => $duration,
                    'serial' => $serial
                ),
            ));
            return \Response::json(['success' => 'Product Success Add On Your Cart']);
        }else{
            Cart::add(array(
                'id' => $product->id,
                'name' => $product->product_name,
                'qty' => 1,
                'price' => str_replace(".", "", $product->discount_price),
                'weight' => 1,
                'options' => array(
                    'image' => $imageCart,
                    'duration' => $duration,
                    'serial' => $serial
                ),
            ));
            return \Response::json(['success' => 'Product Success Add On Your Cart']);
        }
    }

    public function CheckCart(){
        $content = Cart::content();
        return response()->json($content);
    }

    public function ShowCart(){
        $cart = Cart::content();
        return view('pages.cart',compact('cart'));
    }

    public function RemoveCart($rowId)
    {
        Cart::remove($rowId);
        $notification=array(
            'messege'=>'Product Remove From Cart',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function ViewCart($id)
    {
        $product = DB::table('products')
                    ->join('categories','products.category_id','categories.id')
                    ->join('subcategories','products.subcategory_id','subcategories.id')
                    ->join('durations','products.duration_id','durations.id')
                    ->join('brands','products.brand_id','brands.id')
                    ->select('products.*','categories.category_name','subcategories.subcategory_name',
                             'brands.brand_name','durations.time_duration')
                    ->where('products.id',$id)
                    ->first();
        return response()->json($product);
        // return reponse::json(array(
        //     'product' => $product,
        //     'color' => $product_color,
        //     'size' => $product_size,
        // ));
    }

    public function Checkout()
    {
        if(Auth::check()){
            $cart = Cart::content();
            $mytime = Carbon::now();
            $date = $mytime->format('d-m-Y');
            return view('pages.checkout',compact('cart','date'));
        }else{
            $notification=array(
                'messege'=>'Please Login Your Account First',
                'alert-type'=>'error'
            );
            return Redirect()->route('login')->with($notification);
        }
    }

    // Wishlist Function
    public function Wishlist()
    {
        $userid = Auth::id();
        $product =  DB::table('wishlists')
                    ->join('products','wishlists.product_id','products.id')
                    ->select('products.*','wishlists.user_id')
                    ->where('wishlists.user_id',$userid)
                    ->get();

                    //return response()->json($product);
            return view('pages.wishlist',compact('product'));

    }

    public function RemoveWislist($id)
    {
        DB::table('wishlists')->where('product_id',$id)->delete();
        $notification=array(
            'messege'=>'Successfully Deleted Item Wishlist',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    // coupon apply

    public function Coupon(Request $request)
    {
        $coupon = $request->coupon;
        
        $check = DB::table('coupons')->where('coupon',$coupon)->first();
        if ($check) {
            Session::put('coupon',[
                'id' => $check->id,
                'name' => $check->coupon,
                'disount' => $check->discount,
                'balance' => Cart::subtotal()
            ]);
            $notification=array(
                'messege'=>'Successfully Coupon Applied',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }else{
            $notification=array(
                'messege'=>'Invalid Coupon',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function RemoveCoupon(){
        Session::forget('coupon');
        $notification=array(
            'messege'=>'Coupon Remove Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }


    //  Go To Payment Page
    public function Payment()
    {
        # code...
    }

    public function SearchProduct(Request $request)
    {
        $item = $request->search_product;
        $product = DB::table('products')
                    ->where('product_name','LIKE',"%$item%")
                    ->paginate(20);

        return view('pages.search',compact('product'));
    }
}
