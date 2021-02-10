<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function NewOrder()
    {
        $orders = DB::table('invoices')->where('status',0)->get();
        return view('admin.order.pending',compact('orders'));
    }

    public function ViewOrder($id)
    {
        $order = DB::table('invoices')
                ->join('users','invoices.user_id','users.id')
                ->select('invoices.*','users.name')
                ->where('invoices.id',$id)
                ->first();
        
        $details = DB::table('orders_details')
                ->join('products','orders_details.product_id','products.id')
                ->select('orders_details.*','products.product_code','products.image_one','products.product_name')
                ->where('orders_details.order_id',$id)
                ->get();

                //dd($details);
        
        return view('admin.order.view_order',compact('order','details'));
    }

    public function PaymentAccept($id)
    {
        DB::table('invoices')->where('id',$id)->update(['status'=>1]);
        $notification=array(
            'messege'=>'Payment Accept Done',
            'alert-type'=>'success'
        );
        return Redirect()->route('admin.accept.payment')->with($notification);
    }

    public function ProgressProcess($id)
    {
        DB::table('invoices')->where('id',$id)->update(['status'=>2]);
        $notification=array(
            'messege'=>'Send To Progress',
            'alert-type'=>'success'
        );
        return Redirect()->route('admin.progress.order')->with($notification);
    }

    public function DoneProcess($id)
    {
        $product = DB::table('orders_details')->where('order_id',$id)->get();
        foreach ($product as $row){
            DB::table('products')
                    ->where('id',$row->product_id)
                    ->update([
                        'product_quantity' => DB::raw('product_quantity-'.$row->quantity)
                    ]);
        }

        DB::table('invoices')->where('id',$id)->update(['status'=>3]);
        $notification=array(
            'messege'=>'Order Done Process',
            'alert-type'=>'success'
        );
        return Redirect()->route('admin.done.order')->with($notification);
    }

    public function PaymentCancel($id)
    {
        DB::table('invoices')->where('id',$id)->update(['status'=>4]);
        $notification=array(
            'messege'=>'Order Cancel',
            'alert-type'=>'error'
        );
        return Redirect()->route('admin.neworder')->with($notification);
    }


    // with accept payment done
    public function AcceptPayment()
    {
        $orders = DB::table('invoices')->where('status',1)->get();
        return view('admin.order.pending',compact('orders'));
    }
    // Proses Payment in Progress
    public function ProgressPayment()
    {
        $orders = DB::table('invoices')->where('status',2)->get();
        return view('admin.order.pending',compact('orders'));
    }
    // Done Order 
    public function DonePayment()
    {
        $orders = DB::table('invoices')->where('status',3)->get();
        return view('admin.order.pending',compact('orders'));
    }
    // with cancel Order 
    public function CancelPayment()
    {
        $orders = DB::table('invoices')->where('status',4)->get();
        return view('admin.order.pending',compact('orders'));
    }

}
