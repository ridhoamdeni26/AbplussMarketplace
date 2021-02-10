<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Admin\Newslater;
use DB;

class FrontController extends Controller
{
    public function storeNewslater(Request $request){
        $validateData = $request->validate([
            'email' => 'required|unique:newslaters|max:55'
        ]);

        $data = array();
        $data['email'] = $request->email;
        DB::table('newslaters')->insert($data);
        $notification=array(
            'messege'=>'Thanks For Subscribing ',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function OrderTracking(Request $request)
    {
        $code = $request->code;

        $track = DB::table('invoices')->where('status_code',$code)->first();
        if($track){
            return view('pages.tracking',compact('track'));
        }else{
            $notification=array(
                'messege'=>'Status Code Invalid',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

}
