<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class ContactController extends Controller
{

    public function Contact()
    {
        return view('pages.contact');
    }

    public function FormContact(Request $request)
    {
        $data = array();
        $data['name'] = $request->name_contact;
        $data['email'] = $request->email_contact;
        $data['phone'] = $request->phone_contact;
        $data['message'] = $request->message_admin;
        $data['created_at'] = new \DateTime();
        DB::table('contact')->insert($data);

        $notification=array(
            'messege'=>'Your Message Insert Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

}
