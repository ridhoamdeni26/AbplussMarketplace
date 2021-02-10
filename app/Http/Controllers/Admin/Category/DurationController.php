<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Duration;
use DB;

class DurationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function duration(){
        
        $duration = DB::table('durations')->get();
        return view('admin.duration.index',compact('duration'));
    }

    public function StoreDuration(Request $request){
        $validateData = $request->validate([
            'time_duration' => 'required|unique:durations|max:255',
        ]);

        $duration = new Duration();
        $duration->time_duration = $request->time_duration;
        $duration->save();
        $notification=array(
            'messege'=>'Successfully Added Yout Time Duration',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function DeleteDuration($id){
        DB::table('durations')->where('id',$id)->delete();
        $notification=array(
            'messege'=>'Successfully Deleted Time Duration',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function EditDuration($id)
    {
        $duration = Duration::find($id);
	    return response()->json([
	      'data' => $duration
	    ]);
    }

    public function UpdateDuration(Request $request, $id)
    {
        Duration::updateOrCreate(
            ['id' => $id],
            ['time_duration' => $request->name,]
        );
     
        return response()->json([ 'success' => true ]);
    }
}