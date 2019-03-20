<?php

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

class PolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = array('pageTitle' => 'Loyalty Policies');
    return view('admin.policies.index',$title)->with('policies',DB::table('policies')->get());
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
        dd('ok');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = array('pageTitle' => 'Modify Policy');
        return view('admin.policies.edit',$title)->with('policy',DB::table('policies')->where('id',$id)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('policies')->where('id',$id)->update(['amount' => request()->get('amount'),'points' => request()->get('points')]);
        Session::flash('success','Policy successfully updated.');
        return redirect('admin/policies');
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
