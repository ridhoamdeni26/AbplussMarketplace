<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Coupon;
use DB;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function Coupon(){
        $coupon = DB::table('coupons')->get();
        return view('admin.coupon.coupon',compact('coupon'));
    }

    public function StoreCoupon(Request $request){
        $validateData = $request->validate([
            'coupon' => 'required|max:55',
            'discount' => 'required|max:55',
        ]);

        $coupon = new Coupon();
        $coupon->coupon = $request->coupon;
        $coupon->discount = $request->discount;
        $coupon->save();
        $notification=array(
            'messege'=>'Successfully Added Your Coupon',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function DeleteCoupon($id){
        DB::table('coupons')->where('id',$id)->delete();
        $notification=array(
            'messege'=>'Successfully Deleted Your Coupon',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function EditCoupon($id){
        $coupon = Coupon::find($id);
	    return response()->json([
	      'data' => $coupon
	    ]);
    }

    public function UpdateCoupon(Request $request, $id){

    	Coupon::updateOrCreate(
            ['id' => $id],
            ['coupon' => $request->nameCoupon,
             'discount' => $request->discount,
            ]
        );
     
           return response()->json([ 'success' => true ]);
    }

    public function Newslaters(){
        $sub = DB::table('newslaters')->get();
        return view('admin.coupon.newslater',compact('sub'));
    }

    public function DeleteNewslater($id){
        DB::table('newslaters')->where('id',$id)->delete();
        $notification=array(
            'messege'=>'Successfully Deleted Your Subscriber',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function DeleteAllLetter(Request $request)
    {
        $ids = $request->get('idsubs');

        $dbs = DB::delete('delete from newslaters where id in ('.implode(',', $ids).') ');
        $notification=array(
            'messege'=>'All Data Deleted Successfully',
            'alert-type'=>'info'
        );
        return Redirect()->back()->with($notification);
    }
}