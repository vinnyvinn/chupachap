<?php

namespace App\Http\Controllers\Admin;

use App\chupa\Aft\AfricasTalking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\chupa\Repository\SMSRepo;
use DB;
use Session;
use Carbon\Carbon;
use Excel;
use PDF;

class SendSmsController extends Controller
{
    public function initialize()
    {

        $title = array('pageTitle' => 'Initialize SMS');
        return view('admin.sms_index',$title)->with('customers',DB::table('customers')->get());
    }

    public function sendSms(Request $request)
    {
       $this->validate($request,[
          'message' =>'required'
       ]);

        $phone_numbers = [];
        $dat_array = [];
        $message = request()->get('message');
        $customers = DB::table('customers')->get();
        $get_phones = $customers->map(function ($phone) {
            return $phone->customers_id;
        })->toArray();

        if (request()->get('phone_no')) {
            foreach (request()->get('phone_no') as $phone) {
                if (in_array($phone, $get_phones)) {
                    $phone_numbers[] = $phone;
                }
            }

            $details = DB::table('customers')->whereIn('customers_id', $phone_numbers)->get()->toArray();
            foreach ($details as $detail) {
                $dat_array[] = $detail->customers_telephone;
            }

            SMSRepo::init()->sendBulkSms(implode(",",array_filter($dat_array)), $message,$details);

                Session::flash('success', 'Message sent successfully');
                return redirect()->back();


        }


        if (request()->get('phone')) {
            SMSRepo::init()->sendBulk(request()->get('phone'), $message);
            Session::flash('success', 'Message sent successfully');
                return redirect()->back();

        }

           Session::flash('fail','Sorry,something went wrong.Try again later.');
    }

    public function sendMessages()
    {
        $title = array('pageTitle' => 'Sent Messages');
    return view('admin.sent-messages',$title)->with('messages',DB::table('smslogs')->get());
    }

    public function dateFrom()
    {
        $title = array('pageTitle' => 'Choose Period');
        return view('admin.reports.sms.form',$title);
}

    public function getReport()
    {
        $title = array('pageTitle' => 'Sent Messages Report');
        $from = Carbon::parse(request()->get('date_from'))->startOfDay();  //2016-09-29 00:00:00.000000
        $to = Carbon::parse(request()->get('date_to'))->endOfDay();
        $logs = DB::table('smslogs')->whereBetween('created_at', [$from, $to])->get();

        return view('admin.reports.sms.index',$title)->with('messages',$logs)->with('from',$from)->with('to',$to);
}



    public function downloadFile($type,$from,$to)
    {
        $data = DB::table('smslogs')->select('username','email','phone','created_at','message')->whereBetween('created_at', [$from, $to])->get();
        $data= json_decode( json_encode($data), true);
        return Excel::create('chupachap-sample-stock', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }
}
