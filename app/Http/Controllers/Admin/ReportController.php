<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function TodayOrder()
    {
       $date = date('d-m-Y');
       $orders = DB::table('invoices')->where('status',0)->where('date',$date)->get();
       
       return view('admin.report.today_order',compact('orders'));
    }

    public function TodayProgress()
    {
        $date = date('d-m-Y');
        $orders = DB::table('invoices')->where('status',3)->where('date',$date)->get();
       
        return view('admin.report.today_progress',compact('orders'));
    }

    public function MonthOrder()
    {
        $now = Carbon::now()->format('m');
        $orders = DB::table('invoices')
                ->where('status',3)
                ->whereMonth('created_at', Carbon::now()->month)
                ->get();
        
        return view('admin.report.month_order',compact('orders'));
    }

    public function SearchReport()
    {
        
        return view('admin.report.search_report');
    }

    public function SearchByYear(Request $request)
    {

        $year = $request->year_search;
        
        $orders = DB::table('invoices')
        ->where('status',3)
        ->whereYear('created_at', $year)
        ->get();

        $total = DB::table('invoices')
        ->where('status',3)
        ->whereYear('created_at', $year)
        ->sum('total');

        return view('admin.report.search_year',compact('orders','total'));
    }

    public function SearchByMonth(Request $request)
    {
        $month = $request->month_search;

        $orders = DB::table('invoices')
        ->where('status',3)
        ->whereMonth('created_at', $month)
        ->get();

        $total = DB::table('invoices')
        ->where('status',3)
        ->whereMonth('created_at', $month)
        ->sum('total');

        return view('admin.report.search_month',compact('orders','total'));
    }

    public function SearchByDate(Request $request)
    {
        $date = $request->date_search;

        $orders = DB::table('invoices')
        ->where('status',3)
        ->where('date', $date)
        ->get();

        $total = DB::table('invoices')
        ->where('status',3)
        ->where('date', $date)
        ->sum('total');

        return view('admin.report.search_date',compact('orders','total'));

    }


}
