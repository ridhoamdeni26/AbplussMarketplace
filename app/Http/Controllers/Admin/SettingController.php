<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function SiteSetting()
    {
        $setting = DB::table('sitesetting')->first();
        return view('admin.setting.site_setting',compact('setting'));
    }

    public function UpdateSitesetting(Request $request)
    {
        $id = $request->id_setting;

        $data = array();
        $data['phone_one'] = $request->phone_one;
        $data['phone_two'] = $request->phone_two;
        $data['email'] = $request->email_site;
        $data['company_name'] = $request->company_name;
        $data['company_address'] = $request->company_address;
        $data['facebook'] = $request->facebook_site;
        $data['youtobe'] = $request->youtobe_site;
        $data['instagram'] = $request->instgram_site;
        $data['twitter'] = $request->twitter_site;
        $data['created_at'] = new \DateTime();

        DB::table('sitesetting')->where('id',$id)->update($data);

        $notification=array(
            'messege'=>'Site Setting Updated Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

    }
}
