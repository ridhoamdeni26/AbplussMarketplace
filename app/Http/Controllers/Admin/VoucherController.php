<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use Auth;

class VoucherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin.voucher.index');
    }

    public function CreateVoucher()
    {
        return view('admin.voucher.create');
    }

    public function StoreVoucher(Request $request)
    {
        $request->validate([
            'voucher_name' => 'required|max:255',
            'voucher_point' => 'required|max:255',
            'voucher_date' => 'required|date',
            'stock_voucher' => 'required',
        ]);
        
        $data = array();
        $data['name_voucher'] = $request->voucher_name;
        $data['voucher_point'] = $request->voucher_point;
        $data['date_voucher'] = Carbon::parse($request->voucher_date)->format('Y-m-d');
        $data['stock'] = $request->stock_voucher;
        $data['created_at'] = new \DateTime();

        $voucher = DB::table('voucher_list')->insert($data);
        $notification=array(
            'messege'=>'Voucher Inserted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
        
    }

    public function EditVocuher($id)
    {
        $uniq_id = strtoupper(substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 8));
        $idPoint = Auth::id();
        $GetVocuher = DB::table('voucher_list')->where('id',$id)->first();
        $SumPoint = DB::table('points_admin')->where('user_id',$idPoint)->sum('point');
        $debitPoint = DB::table('claim_voucher')->where('user_id',$idPoint)->sum('debit_point');
        $today = date('Y-m-d');

        $data = array([
            'user_id' => $idPoint,
            'voucher_id' => $id,
            'time_used' => $today,
            'uniq_code' => $uniq_id,
            'debit_point' => $GetVocuher->voucher_point,
            'created_at' => new \DateTime()
        ]);
        
        $credit_point = $SumPoint - $debitPoint;

        if ($GetVocuher->date_voucher < $today){
            return \Response::json(['error' => 'Sorry For This Voucher no Longer Exists']);
        }

        if($GetVocuher->voucher_point > $credit_point){
            return \Response::json(['error' => 'Sorry, Your Points are Insufficient To Claim This Voucher']);
        }else{
            DB::table('claim_voucher')->insert($data);
            return \Response::json(['success' => 'Yeayy !! You Get New Voucher']);
        }

        
        
    }

    public function ClaimVocuher(Request $request)
    {
        // $userid = Auth::id();
        // $check = DB::table('wishlists')->where('user_id',$userid)->where('voucher',$id)->first();

        $data = array();
        $data['user_id'] = $request->id_user;
        $data['voucher_id'] = $request->id;
        $data['time_used'] = $request->date_voucher;
        $data['uniq_code'] = $request->uniq_code;

    }
}
