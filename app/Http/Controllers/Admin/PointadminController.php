<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use Session;
use DB;

class PointadminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function PointAdmin()
    {
        $data = array();
        $data['user_id'] = Auth::id();
        $data['name_point'] = 'Completed Lesson';
        $data['key'] = 'completed-lesson';
        $data['description'] = 'Reward for completing a lesson';
        $data['point'] = 100;
        $data['created_at'] = new \DateTime();

        foreach ($data as $point) {
            $id = Auth::id();
            $exists = DB::table('points_admin')->where('user_id',$id)->where('key', $data['key'])->first();
            if (!$exists) {
                DB ::table('points_admin')->insert($data);
            }
        }
        
        // dd($data);
    }
}
