<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function BlogCatList(){
        $blogcat = DB::table('post_category')->get();
        return view('admin.blog.category.index',compact('blogcat'));
    }

    public function StoreBlog(Request $request){

        $validateDate = $request->validate([
            'category_name_en' => 'required|max:255',
            'category_name_id' => 'required|max:255',
        ]);

        $data = array();
        $data['category_name_en'] = $request->category_name_en;
        $data['category_name_id'] = $request->category_name_id;
        $data['created_at'] = new \DateTime();
        DB ::table('post_category')->insert($data);
        $notification=array(
            'messege'=>'Blog Category Add Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function BlogDeleteBlog($id){
        DB::table('post_category')->where('id',$id)->delete();
        $notification=array(
            'messege'=>'Successfully Deleted Blog Category',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function BlogEdit($id){
        $BlogCat = DB::table('post_category')->where('id',$id)->first();
	    return response()->json([
	      'data' => $BlogCat
	    ]);
    }

    public function BlogUpdate(Request $request, $id){

        DB::table('post_category')->where('id',$id)->update([
            'id' => $request->id,
            'category_name_en' => $request->category_name_en,
            'category_name_id' => $request->category_name_id,
            'updated_at' => new \DateTime(),
        ]);

        return response()->json([ 'success' => true ]);
    }

    public function CreatePost(){
        $blogCategory = DB::table('post_category')->get();
        return view('admin.blog.create',compact('blogCategory'));
    }

    public function StorePost(Request $request){
        $validateDate = $request->validate([
            'post_tittle_en' => 'required|max:255',
            'post_tittle_id' => 'required|max:255',
            'category_id' => 'required|max:255',
            'details_en' => 'required|max:255',
            'details_id' => 'required|max:255',
        ]);

        $data = array();
        $data['post_tittle_en'] = $request->post_tittle_en;
        $data['post_tittle_id'] = $request->post_tittle_id;
        $data['category_id'] = $request->category_id;
        $data['details_en'] = $request->details_en;
        $data['details_id'] = $request->details_en;
        $data['created_at'] = new \DateTime();

        $post_image = $request->file('post_image');

        if ($post_image) {
            // get image with uniq code ex : 198012.png or /jpg with client original extension
            $post_image_name = hexdec(uniqid()).'.'.$post_image->getClientOriginalExtension();
            Image::make($post_image)->resize(400,200)->save('public/media/posts/'.$post_image_name);
            $data['post_image'] = 'public/media/posts/'.$post_image_name;

            DB::table('posts')->insert($data);
            $notification=array(
                'messege'=>'Post Blog Inserted Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }else{
            $data['post_image'] = "";
            DB::table('posts')->insert($data);
            $notification=array(
                'messege'=>'Post Blog Inserted Without Image Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function IndexPost(){
        $post = DB::table('posts')
                ->join('post_category','posts.category_id','post_category.id')
                ->select('posts.*','post_category.category_name_en')
                ->get();
                // dd($post);
                return view('admin.blog.index',compact('post'));
    }

    public function DeletePost($id){
        $post = DB::table('posts')->where('id',$id)->first();
        $image = $post->post_image;
        unlink($image);

        DB::table('posts')->where('id',$id)->delete();
        $notification=array(
            'messege'=>'Successfully Deleted Post',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function EditPost($id){
        $post = DB::table('posts')->where('id',$id)->first();
        return view('admin.blog.edit',compact('post'));
    }

    public function UpdatePost(Request $request, $id){

        $old_post_one = $request->old_post_one;

        $data = array();
        $data['post_tittle_en'] = $request->post_tittle_en;
        $data['post_tittle_id'] = $request->post_tittle_id;
        $data['category_id'] = $request->category_id;
        $data['details_en'] = $request->details_en;
        $data['details_id'] = $request->details_en;

        $post_image = $request->file('post_image');

        if ($post_image) {
            $post_image_name = hexdec(uniqid()).'.'.$post_image->getClientOriginalExtension();
            Image::make($post_image)->resize(400,200)->save('public/media/posts/'.$post_image_name);
            $data['post_image'] = 'public/media/posts/'.$post_image_name;

            DB::table('posts')->where('id',$id)->update($data);
            $notification=array(
                'messege'=>'Post Blog Updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('all.blogpost')->with($notification);
        }else{
            $data['post_image'] = $old_post_one;
            DB::table('posts')->where('id',$id)->update($data);
            $notification=array(
                'messege'=>'Post Updated without Image Successfully',
                'alert-type'=>'warning'
            );
            return Redirect()->route('all.blogpost')->with($notification);
        }

    }
}
