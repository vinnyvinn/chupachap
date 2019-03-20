<?php

/*
Project Name: IonicEcommerce
Project URI: http://ionicecommerce.com
Author: VectorCoder Team
Author URI: http://vectorcoder.com/
Version: 2.8
*/
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\chupa\Repository\PaymentsRepo;
//validator is builtin class in laravel
use Carbon\Carbon;
use Validator;
use App;
use Lang;
use DB;


use Hash;
use App\Administrator;


use Auth;

use Illuminate\Http\Request;

use Session;

class LoyaltyPointsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = array('pageTitle' => 'Customer Loyalty Points');
        return view('admin.loyalty.index',$title)->with('customers',DB::table('customers')->where('enrolled',1)->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function debit($id)
    {
        $title = array('pageTitle' => 'Debit Points');
      return view('admin.loyalty.debit',$title)->with('customer',DB::table('customers')->where('customers_id',$id)->first());
 }

    public function redeem($id)
    {
        $title = array('pageTitle' => 'Debit Points');
        return view('admin.loyalty.redeem',$title)->with('customer',DB::table('customers')->where('customers_id',$id)->first());
 }

    public function transfer($id)
    {
        $title = array('pageTitle' => 'Debit Points');
        return view('admin.loyalty.transfer',$title)
            ->with('customer',DB::table('customers')->where('customers_id',$id)->first())
             ->with('customers',DB::table('customers')->where('enrolled',1)->get());
 }

    public function updateDebit()
    {

        $calculate_points = DB::table('policies')->where('title','AMOUNT SPENT TO EARN POINTS GIVEN')->first()->amount;
        $get_points = round(request()->get('amount')/$calculate_points,0);
        DB::table('customers')->where('customers_id',request()->get('id'))->increment('loyalty_points',$get_points);
        DB::table('customers')->where('customers_id',request()->get('id'))->update(['updated_at'=>Carbon::now()]);
        Session::flash('success','amount debited successfully.');
        return redirect('admin/points');

 }

    public function updateRedeem()
    {
        $calculate_points = DB::table('policies')->where('title','VALUE OF POINTS WHEN REDEEMING')->first()->amount;
        $get_points = round(request()->get('amount')/$calculate_points,0);
        DB::table('customers')->where('customers_id',request()->get('id'))->decrement('loyalty_points',$get_points);
        DB::table('customers')->where('customers_id',request()->get('id'))->update(['updated_at'=>Carbon::now()]);
        Session::flash('success','amount redeemed successfully.');
        return redirect('admin/points');
 }

    public function updateTransfer()
    {
        $amount =request()->get('amount');

        $from_customer = DB::table('customers')->where("customers_id", request()->get('id'))->first();
        $to_customer = DB::table('customers')->where("customers_id", request()->get('customer_id'))->first();
         if ($from_customer->customers_id == $to_customer->customers_id){
            Session::flash('fail','Sorry,you cannot transfer points to the same account.');
            return redirect()->back();
         }
        if ($from_customer->loyalty_points < $amount){
            Session::flash('fail','Sorry,the requested amount exceeds the limit.');
            return redirect()->back();
        }


        DB::table('customers')->where('customers_id', $from_customer->customers_id)->decrement('loyalty_points', $amount);
        DB::table('customers')->where('customers_id', $to_customer->customers_id)->increment('loyalty_points', $amount);
        DB::table('customers')->where('customers_id', $from_customer->customers_id)->update(['updated_at' => Carbon::now()]);
        DB::table('customers')->where('customers_id', $to_customer->customers_id)->update(['updated_at' => Carbon::now()]);
        Session::flash('success', 'amount debited successfully');
         return redirect('admin/points');
    }

    public function enroll($id)
    {

        $customer = DB::table('customers')->where('customers_id',$id)->first()->enrolled;
        return response()->json($customer);
    }

    public function SaveEnroll($id)
    {
        $points = DB::table('policies')->where('title','POINTS AWARDED WHEN ENROLLING')->first()->points;
        DB::table('customers')->where('customers_id',request()->get('customer_id'))->update(['enrolled'=>request()->get('enrolled'),'loyalty_points' =>$points]);
       return response()->json(request()->all());
    }

    /**
     * Update the specified resource customers_idin storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
