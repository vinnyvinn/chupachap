<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;

class AgeverifyController extends Controller
{
    //

    public function verify(Request $request)

    {
        $dateOfBirth = $request->get('dob');
        $years = Carbon::parse($dateOfBirth)->age;
        
        
        if($years == '18')
        $verified = 'verified';
        return view('index');
        else

        return url('/');
    
    }
    
   
}
