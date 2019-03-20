<?php
/**
 * Created by PhpStorm.
 * User: vinnyvinny
 * Date: 11/1/18
 * Time: 3:20 PM
 */

namespace App\chupa\Repository;
use App\chupa\Aft\AfricasTalking;
use DB;
use Carbon\Carbon;
class SMSRepo
{
public static function init(){
return new self;
}

public function sendSms($total,$customer){

    $AT = new AfricasTalking(config('aft.user_name'),config('aft.owner_secret'));
    $sms= $AT->sms();
    $sms->send([
        'to'      => $customer->customers_telephone,
        'message' => 'Hi '.$customer->customers_firstname.' '.$customer->customers_lastname. ', You have successfully placed an order of ksh.'.$total. ' on Chupachap.
          Login to www.chupachap.co.ke/checkout to complete checkout'
    ]);

    self::logMessageCheckout($customer);
}

public function accountCreated($data,$password){
    $AT = new AfricasTalking(config('aft.user_name'),config('aft.owner_secret'));
    $sms= $AT->sms();
    $sms->send([
        'to'      => $data['customers_telephone'],
        'message' => 'Dear '.$data['customers_firstname'].' '.$data['customers_lastname']. ', Your account has been created.
         Username: '.$data['email'] .
        ' Password: ' .$password .'
         Login to www.chupachap.co.ke/login to checkout.'
    ]);
    self::logMessageAccount($data);
}
   
    public function sendBulk($details,$message)
    {

        $AT = new AfricasTalking(config('aft.user_name'),config('aft.owner_secret'));
        $sms= $AT->sms();
        $sms->send([
            'to'      => $details,
            'message' => $message,

        ]);

        self::smslogNewCustomers(preg_split("/[,]/",$details),$message);
}
    public function sendBulkSms($details,$message,$client_info)
    {

        $AT = new AfricasTalking(config('aft.user_name'),config('aft.owner_secret'));
        $sms= $AT->sms();
        $sms->send([
            'to'      => $details,
            'message' => $message,

        ]);

        self::smsLogs($client_info,$message);
    }

    public function smsLogs($details,$message)
    {
        foreach ($details as $detail){
            DB::table('smslogs')->insert([
                'username' => $detail->customers_firstname.' '.$detail->customers_lastname,
                'email' => $detail->email,
                'phone' => $detail->customers_telephone,
                'message' => $message,
                'created_at' => Carbon::now()
            ]);

        }



}

    public function smslogNewCustomers($details,$message)
    {
foreach ($details as $phone) {

    DB::table('smslogs')->insert([
        'username' => 'NEW CUSTOMER',
        'email' => 'customer@email.com',
        'phone' => $phone,
        'message' => $message,
        'created_at' => Carbon::now()

    ]);

}

}

    public function logMessageAccount($data)
    {
        DB::table('smslogs')->insert([
            'username' => $data['customers_firstname'].' '.$data['customers_lastname'],
            'email' => $data['email'],
            'phone' => $data['customers_telephone'],
            'message' => 'Account Created',
            'created_at' => Carbon::now()

        ]);
}

    public function logMessageCheckout($data)
    {
        DB::table('smslogs')->insert([
            'username' => $data->customers_firstname.' '.$data->customers_lastname,
            'email' => $data->email,
            'phone' => $data->customers_telephone,
            'message' => 'You have successfully placed an order',
            'created_at' => Carbon::now()

        ]);
    }
}
