<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Response;
use Auth;
use Session;
use Carbon\Carbon;
Use PDF;
use App\Model\Admin\Invoice;
use Dompdf\Dompdf;
use Dompdf\Options;
use Mail;
use App\Mail\InvoiceMail;

class PaymentController extends Controller
{
    public function Payment(Request $request)
    {
        $email = Auth::user()->email;
        $product = DB::table('invoices')->orderBy('id', 'DESC')->first();
        $receipt = $product->receipt_number;

        $user_id = Auth::id();
        $cart = Cart::content();
        $mytime = Carbon::now();
        $date = $mytime->format('d-m-Y');

        $year = $mytime->format('Y');
        $mwm = 'mwm';
        $val = 1;
        $receiptNumber = $receipt;

        if($receiptNumber < 9999) {

            $receiptNumber = $receiptNumber + 1;

        }else{
            $receiptNumber = 1;
        }
        
        $final_code = $mwm . '/' . $year . '/' . str_pad($receiptNumber,4,"0",STR_PAD_LEFT);


        // insert invoice table
        $data = array();
        $data['user_id'] = Auth::id();
        $data['name_buyer'] = $request->buyer_name;
        $data['email'] = $request->email_buyer;
        $data['phone'] = $request->phone_buyer;
        $data['address'] = $request->address_buyer;
        $data['city_buyer'] = $request->city_buyer;

        if (Session::has('coupon')) {

            $data['subtotal'] = $request->subtotalCoupon;
            $data['total'] = $request->FinalTotalDisc;
            $data['vat'] = $request->VatInvoice;
            $data['cuopon_id'] = $request->coupon_id;
        }else{
            $data['subtotal'] = $request->subtotalWithoutCoupon;
            $data['total'] = $request->totalWithoutCoupon;
            $data['vat'] = $request->TaxInvoice;
            $data['cuopon_id'] = $request->couponid;
        }

        $data['date'] = $request->date_invoice;
        $data['invoice_number'] = $final_code;
        $data['receipt_number'] = $receiptNumber;
        $data['status_code'] = mt_rand(100000,999999);
        $data['status'] = 0;
        $data['created_at'] = new \DateTime();

        $invoice_id = DB::table('invoices')->insertGetId($data);

        $data['çontent'] = Cart::content();                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      

        // Send Invoice To Email
        Mail::to($email)->send(new InvoiceMail($data));

        //Insert Order Details Table
        $content = Cart::content();
        $details = array();

        foreach($content as $row){
            $details['order_id'] = $invoice_id;
            $details['product_id'] = $row->id;
            $details['product_name'] = $row->name;
            $details['quantity'] = $row->qty;
            $details['singleprice'] = $row->price;
            $details['totalprice'] = $row->qty*$row->price;
            $details['serial'] = $row->options->serial;
            $details['created_at'] = new \DateTime();
            DB::table('orders_details')->insert($details);
        }

        if (Session::has('coupon')){
            Session::forget('coupon');
        }

        return view('pages.invoice')->with($data);

    }

    public function PdfPrint()
    {
        $user_id = Auth::id();
        $data = DB::table('invoices')->where('user_id',$user_id)->orderBy('id', 'DESC')->first();
        // get pdf view page
        $dompdf = new Dompdf();

        $dompdf = PDF::loadView('pages.invoice_print',['data'=>$data])
        ->setPaper('a4')
        ->setOptions(['defaultFont' => 'sans-pro']);
        // download PDF file with download method
        return $dompdf->download('pdf_file.pdf');
    }

    public function donePayment()
    {
        Cart::destroy();
        $notification=array(
            'messege'=>'Thanks For Your Order',
            'alert-type'=>'success'
        );
        return Redirect()->to('/')->with($notification);
    }

    public function SuccessList()
    {
        $order = DB::table('invoices')->where('user_id',Auth::id())->where('status',3)->orderBy('id','DESC')->limit(5)->get();
        return view('pages.returnorder',compact('order'));
    }

    public function RequestReturn($id)
    {
        DB::table('invoices')->where('id',$id)->update([
            'return_order' => 1
        ]);
        $notification=array(
            'messege'=>'Order Request Done',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

}
