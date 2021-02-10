<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Subcategory;
use DB;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function subcategory(){
        $category = DB::table('categories')->get();
        $subcat = DB::table('subcategories')
                    ->join('categories','subcategories.category_id','categories.id')
                    ->select('subcategories.*','categories.category_name')
                    ->get();
        
        return view('admin.category.subcategory',compact('category','subcat'));
    }

    public function storesubcat(Request $request){
        $validateData = $request->validate([
            'category_id' => 'required|max:55',
            'subcategory_name' => 'required|max:55',
        ]);

        $subcat = new Subcategory();
        $subcat->category_id = $request->category_id;
        $subcat->subcategory_name = $request->subcategory_name;
        $subcat->save();
        $notification=array(
            'messege'=>'Successfully Inserted Sub Category',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function Deletesubcat($id){
        DB::table('subcategories')->where('id',$id)->delete();
        $notification=array(
            'messege'=>'Successfully Deleted Sub Category',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function Editsubcat($id){
        $subcat = DB::table('subcategories')->where('id',$id)->first();
        $category = DB::table('categories')->get();
        return view('admin.category.edit_subcat',compact('subcat','category'));
    }

    public function Updatesubcat(Request $request, $id){
        $data = array();
        $data['category_id'] = $request->category_id;
        $data['subcategory_name'] = $request->subcategory_name;
        DB::table('subcategories')->where('id',$id)->update($data);
        $notification=array(
            'messege'=>'Successfully Updated Sub Category',
            'alert-type'=>'success'
        );
        return Redirect()->route('sub.categories')->with($notification);
    }
}
