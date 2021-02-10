<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ReturnController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function ReturnRequest()
    {
        $orders = DB::table('invoices')->where('return_order',1)->get();
        return view('admin.return.return_request',compact('orders'));
    }

    public function ApproveReturn($id)
    {
        DB::table('invoices')->where('id',$id)->update([
            'return_order' => 2
        ]);
        $notification=array(
            'messege'=>'Return Order Success, Thanks You',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function AllReturn()
    {
        $orders = DB::table('invoices')->where('return_order',2)->get();
        return view('admin.return.all_return',compact('orders'));
    }
}
