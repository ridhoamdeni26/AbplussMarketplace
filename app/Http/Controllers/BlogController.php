<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Session;

class BlogController extends Controller
{
    public function BlogView()
    {
        $post = DB::table('posts')
                ->join('post_category','posts.category_id','post_category.id')
                ->select('posts.*','post_category.category_name_en','post_category.category_name_id')
                ->get();

                //return response()->json($post);
            return view('pages.blog',compact('post'));
    }

    public function English()
    {
        Session::get('lang');
        Session()->forget('lang');
        Session::put('lang','english');
        return redirect()->back();
    }

    public function Indonesia()
    {
        Session::get('lang');
        Session()->forget('lang');
        Session::put('lang','indonesia');
        return redirect()->back();
    }

    public function BlogDetails($id)
    {
        $blogs = DB::table('posts')->where('id',$id)->get();
        return view('pages.blog_single',compact('blogs'));
    }
}
