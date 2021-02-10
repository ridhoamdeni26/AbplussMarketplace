<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Category;
use DB;

class CategoryController extends Controller
{
    // onlu admin can access
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function category(){
        
        // take all data from Category Database
        $category = Category::all();
        return view('admin.category.category',compact('category'));
    }


    public function storecategory(Request $request){
        // add new category

        //set up validation
        $validateData = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ]);
        
        // Query Builder
        // $data = array();
        // $data['category_name'] = $request->category_name;
        // DB::table('categories')->insert($data);

        // Eloquent ORM
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->save();

        // using Toastr
        $notification=array(
            'messege'=>'Successfully Added Category',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function Deletecategory($id){
        DB::table('categories')->where('id',$id)->delete();
        $notification=array(
            'messege'=>'Successfully Deleted Category',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

    }

    public function Editcategory($id){

        $category = Category::find($id);
	    return response()->json([
	      'data' => $category
	    ]);
    }

    public function Updatecategory(Request $request, $id){

    	Category::updateOrCreate(
            ['id' => $id],
            ['category_name' => $request->name,]
        );
     
           return response()->json([ 'success' => true ]);
    }

    
}
