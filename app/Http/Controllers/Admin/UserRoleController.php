<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;

class UserRoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function UserRole()
    {
        $user = DB::table('admins')->where('type',2)->get();
        return view('admin.role.all_role',compact('user'));
    }

    public function UserCreate()
    {
        return view('admin.role.create_role');
    }

    public function StoreAdmin(Request $request)
    {
        $validateData = $request->validate([
            'name_admin' => 'required|min:6|max:50',
            'phone_admin' => 'required|numeric|min:8',
            'email' => 'required|email|unique:admins',
            'password_admin' => 'required|min:6',
        ]);

        $data = array();
        $data['name'] = $request->name_admin;
        $data['phone'] = $request->phone_admin;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password_admin); 
        $data['category'] = $request->category_admin;
        $data['coupon'] = $request->coupon_admin;
        $data['product'] = $request->product_admin;
        $data['blog'] = $request->blog_admin;
        $data['order'] = $request->order_admin;
        $data['newsletter'] = $request->newsletter_admin;
        $data['report'] = $request->report_admin;
        $data['role'] = $request->role_admin;
        $data['return'] = $request->return_admin;
        $data['contact'] = $request->contact_admin;
        $data['comment'] = $request->comment_admin;
        $data['setting'] = $request->setting_admin;
        $data['stock'] = $request->stock_admin;
        $data['created_at'] = new \DateTime();
        $data['type'] = 2;

        //dd($data);

        DB::table('admins')->insert($data);
        $notification=array(
            'messege'=>'Admin Data Inserted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('admin.all.user')->with($notification);
    }

    public function DeleteAdmin($id)
    {
        DB::table('admins')->where('id',$id)->delete();
        $notification=array(
            'messege'=>'Successfully Deleted User Admin User',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
    
    public function EditAdmin($id)
    {
        $admin = DB::table('admins')->where('id',$id)->first();
	    return response()->json([
	      'data' => $admin
	    ]);
    }

    public function UpdateAdmin(Request $request, $id)
    {   

        $data = array();
        $data['id'] = $request->id;
        $data['name'] = $request->nameAdmin;
        $data['phone'] = $request->phoneAdmin;
        $data['email'] = $request->emailAdmin;
        $data['password'] = Hash::make($request->passwordAdmin); 
        $data['category'] = $request->catAdmin;
        $data['coupon'] = $request->coupon_admin;
        $data['product'] = $request->product_admin;
        $data['blog'] = $request->blog_admin;
        $data['order'] =  $request->order_admin;
        $data['newsletter'] = $request->newsletter_admin;
        $data['report'] = $request->report_admin;
        $data['role'] = $request->role_admin;
        $data['return'] = $request->return_admin;
        $data['contact'] = $request->contact_admin;
        $data['comment'] = $request->comment_admin;
        $data['setting'] = $request->setting_admin;
        $data['stock'] = $request->stock_admin;
        $data['updated_at'] = new \DateTime();

        DB::table('admins')->where('id',$id)->update($data);

        return response()->json($data);
    }

    public function ProductStock()
    {
        $product = DB::table('products')
                   ->join('categories','products.category_id','categories.id')
                   ->join('durations','products.duration_id','durations.id')
                   ->join('brands','products.brand_id','brands.id')
                   ->select('products.*','categories.category_name','brands.brand_name','durations.time_duration')
                   ->get();

        return view('admin.stock.stock',compact('product'));
    }

    public function LogUser()
    {
        $logs = DB::table('logs')->get();
        return view('admin.log.log_user',compact('logs'));
    }
}
