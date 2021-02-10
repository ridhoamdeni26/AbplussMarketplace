<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function AllMessage()
    {
        $message = DB::table('contact')->get();
        return view('admin.contact.all_message',compact('message'));
    }
}
