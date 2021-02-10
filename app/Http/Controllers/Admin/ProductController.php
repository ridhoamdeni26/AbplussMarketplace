<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Product;
use DB;
use Image;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $product = DB::table('products')
                   ->join('categories','products.category_id','categories.id')
                   ->join('durations','products.duration_id','durations.id')
                   ->join('brands','products.brand_id','brands.id')
                   ->select('products.*','categories.category_name','brands.brand_name','durations.time_duration')
                   ->get();
                    //dd($product);
                //    return response()->json($product);
                return view('admin.product.index',compact('product'));
    }

    public function create(){
        $category = DB::table('categories')->get();
        $duration = DB::table('durations')->get();
        $brand = DB::table('brands')->get();

        return view('admin.product.create',compact('category','brand','duration'));
    }

    public function GetSubcat($category_id){
        $cat = DB::table('subcategories')->where('category_id',$category_id)->get();
        return json_encode($cat);
    }

    public function storeProduct(Request $request){
        
        $validateData = $request->validate([
            'product_name' => 'required|max:255',
            'product_code' => 'required|unique:products|max:55',
            'product_quantity' => 'required|max:255',
            'product_size' => 'required|max:255',
            'product_color' => 'required|max:255',
            'selling_price' => 'required|max:255',
            'product_detail' => 'required',
            'image_one' => 'required|image|mimes:jpeg,png,jpg,svg|max:5000',
            'image_two' => 'required|image|mimes:jpeg,png,jpg,svg|max:5000',
        ]);

        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_code'] = $request->product_code;
        $data['product_quantity'] = $request->product_quantity;
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['brand_id'] = $request->brand_id;
        $data['duration_id'] = $request->duration_id;
        $data['product_size'] = implode(',', $request->product_size);
        $data['product_color'] = implode(',', $request->product_color);
        $data['selling_price'] = $request->selling_price;
        $data['discount_price'] = $request->discount_price;
        $data['product_details'] = $request->product_detail;
        $data['video_link'] = $request->video_link;
        $data['main_slider'] = $request->main_slider;
        $data['hot_deal'] = $request->hot_deal;
        $data['best_rated'] = $request->best_rated;
        $data['trend'] = $request->trend;
        $data['mid_slider'] = $request->mid_slider;
        $data['hot_new'] = $request->hot_new;
        $data['created_at'] = new \DateTime();
        $data['status'] = 1;

        $image_one = $request->image_one;
        $image_two = $request->image_two;
        // $image_three = $request->image_three;

        // return response()->json($data);

        if ($image_one && $image_two){
            // get image with uniq code ex : 198012.png or /jpg with client original extension
            //image One
            $image_one_name = hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(300,300)->save('public/media/product/'.$image_one_name);
            //image Two
            $image_two_name = hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
            Image::make($image_two)->resize(300,300)->save('public/media/product/'.$image_two_name);

            $data['image_two'] = 'public/media/product/'.$image_two_name;
            $data['image_one'] = 'public/media/product/'.$image_one_name;
            $product = DB::table('products')->insert($data);
            $notification=array(
                'messege'=>'Product Inserted Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }

        // if ($image_two) {
        //     $image_two_name = hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
        //     Image::make($image_two)->resize(300,300)->save('public/media/product/'.$image_two_name);
        //     $data['image_two'] = 'public/media/product/'.$image_two_name;
        //     $product = DB::table('products')->insert($data);
        //     $notification=array(
        //         'messege'=>'Product Inserted Successfully',
        //         'alert-type'=>'success'
        //     );
        //     return Redirect()->back()->with($notification);
        // }

        // if($image_three){
        //     $image_three_name = hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
        //     Image::make($image_three)->resize(300,300)->save('public/media/product/'.$image_three_name);
        //     $data['image_three'] = 'public/media/product/'.$image_three_name;
        //     $product = DB::table('products')->insert($data);
        //     $notification=array(
        //         'messege'=>'Product Inserted Successfully',
        //         'alert-type'=>'success'
        //     );
        //     return Redirect()->back()->with($notification);
        // }
    }

    public function inactive($id){
        DB::table('products')->where('id',$id)->update([
            'status' => 0
        ]);
        $notification=array(
            'messege'=>'Product Successfully Inactive',
            'alert-type'=>'warning'
        );
        return Redirect()->back()->with($notification);
    }

    public function active($id){
        DB::table('products')->where('id',$id)->update([
            'status' => 1
        ]);
        $notification=array(
            'messege'=>'Product Successfully Active',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function delete($id){
        $product = DB::table('products')->where('id',$id)->first();
        $image = $product->image_one;
        $image2 = $product->image_two;
        $image3 = $product->image_three;
        unlink($image);
        unlink($image2);
        // unlink($image3);
        $brand = DB::table('products')->where('id',$id)->delete();
        $notification=array(
            'messege'=>'Product Deleted Sucessfully ',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function show($id){
        $product = DB::table('products')
                   ->join('categories','products.category_id','categories.id')
                   ->join('subcategories','products.subcategory_id','subcategories.id')
                   ->join('durations','products.duration_id','durations.id')
                   ->join('brands','products.brand_id','brands.id')
                   ->select('products.*','categories.category_name','brands.brand_name','subcategories.subcategory_name','durations.time_duration')
                   ->where('products.id',$id)
                   ->first();
	    return response()->json([
	      'data' => $product
	    ]);
    }

    public function edit($id){
        $product = DB::table('products')->where('id',$id)->first();
        $productNew = DB::table('products')->where('id',$id)->get();
        // $ProductColor = [];
        // $ProductSize = [];

        // foreach($productNew as $key=>$object){
        //     $product_color =  explode(',', $object->product_color);
        //     $dataColor = [
        //         'id' => $object->id, 
        //         'text' => $product_color,
        //         'selected' => true,
        //     ];
        //     array_push($ProductColor, $dataColor);
        // }

        // foreach($productNew as $key=>$object){
        //     $product_size =  explode(',', $object->product_size);
        //     $dataSize = [
        //         'id' => $object->id, 
        //         'text' => $product_size,
        //         'selected' => true,
        //     ];
        //     array_push($ProductSize, $dataSize);
        // }
        return view('admin.product.edit',compact('product', 'productNew'));
    }

    public function UpdateProductWithoutPhoto(Request $request, $id){
        
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_code'] = $request->product_code;
        $data['product_quantity'] = $request->product_quantity;
        $data['discount_price'] = $request->discount_price;
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['brand_id'] = $request->brand_id;
        $data['product_size'] = implode(',', $request->editProductsize);
        $data['product_color'] = implode(',', $request->editProductcolor);
        $data['selling_price'] = $request->selling_price;
        $data['product_details'] = $request->product_detail;
        $data['video_link'] = $request->video_link;
        $data['main_slider'] = $request->main_slider;
        $data['hot_deal'] = $request->hot_deal;
        $data['best_rated'] = $request->best_rated;
        $data['trend'] = $request->trend;
        $data['mid_slider'] = $request->mid_slider;
        $data['hot_new'] = $request->hot_new;
        $data['updated_at'] = new \DateTime();

        // return response()->json($data);

        $update = DB::table('products')->where('id',$id)->update($data);
        if ($update) {
            $notification=array(
                'messege'=>'Product Update Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('all.product')->with($notification);
        }else{
            $notification=array(
                'messege'=>'Nothing To Update Your Product',
                'alert-type'=>'error'
            );
            return Redirect()->route('all.product')->with($notification);
        }
    }

    public function UpdateProductWithPhoto(Request $request, $id){

        $old_one = $request->old_one;
        $old_two = $request->old_two;
        // $old_three = $request->old_three;
            
        $data = array();

        $image_one = $request->file('image_one');
        $image_two = $request->file('image_two');
        // $image_three = $request->file('image_three');

        if ($image_one) {
            unlink($old_one);
            // get data time with date
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image_one->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext; 
            $upload_path = 'public/media/product/';
            $image_url = $upload_path.$image_full_name;
            $success = $image_one->move($upload_path,$image_full_name);

            $data['image_one'] = $image_url;
            $product = DB::table('products')->where('id',$id)->update($data);
            $notification=array(
                'messege'=>'Successfully Updated Product Image One',
                'alert-type'=>'success'
            );
            return Redirect()->route('all.product')->with($notification);
        }

        if ($image_two) {
            unlink($old_two);
            // get data time with date
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image_two->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext; 
            $upload_path = 'public/media/product/';
            $image_url = $upload_path.$image_full_name;
            $success = $image_two->move($upload_path,$image_full_name);

            $data['image_two'] = $image_url;
            $product = DB::table('products')->where('id',$id)->update($data);
            $notification=array(
                'messege'=>'Successfully Updated Product Image two',
                'alert-type'=>'success'
            );
            return Redirect()->route('all.product')->with($notification);
        }

        // if ($image_three) {
        //     // get data time with date
        //     // unlink($old_three);
        //     $image_name = date('dmy_H_s_i');
        //     $ext = strtolower($image_three->getClientOriginalExtension());
        //     $image_full_name = $image_name.'.'.$ext; 
        //     $upload_path = 'public/media/product/';
        //     $image_url = $upload_path.$image_full_name;
        //     $success = $image_three->move($upload_path,$image_full_name);

        //     $data['image_three'] = $image_url;
        //     $product = DB::table('products')->where('id',$id)->update($data);
        //     $notification=array(
        //         'messege'=>'Successfully Updated Product Image three',
        //         'alert-type'=>'success'
        //     );
        //     return Redirect()->route('all.product')->with($notification);
        // }
    }
}
