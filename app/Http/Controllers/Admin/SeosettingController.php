<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class SeosettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function SeoSetting()
    {
        $seo = DB::table('seo')->first();
        return view('admin.seo.seo',compact('seo'));
    }

    public function SeoUpdate(Request $request)
    {
        $id = $request->id_seo;

        $data = array();
        $data['meta_tittle'] = $request->meta_tittle;
        $data['meta_author'] = $request->meta_author;
        $data['meta_tag'] = $request->meta_tag;
        $data['meta_description'] = $request->meta_description;
        $data['google_analytics'] = $request->google_analytics;
        $data['bing_analytics'] = $request->bing_analytics;
        $data['created_at'] = new \DateTime();
        //dd($id);

        DB::table('seo')->where('id',$id)->Update($data);

        $notification=array(
            'messege'=>'Seo Updated Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

    }
}
