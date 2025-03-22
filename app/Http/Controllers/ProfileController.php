<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\Admin\Registered;
use App\Models\Admin\Instalment;
use App\Models\Admin\Programs;
use App\Models\Admin\Academy;


use App\Models\Admin\Uniform;
use DB;
use Carbon\Carbon;

class ProfileController extends Controller
{
    public function profile(Request $request)
    {
        

        
        
    
        $phone = $request->input('phone');
        $birth_date = $request->input('birth_date');

        $lastFourDigits = substr($phone, -5);

 
    
        $registered = Registered::with('payment_student')->where('phone', 'like', '%' . $lastFourDigits)->where('birth_date' , '=' , $birth_date)->first();
        $attend = Registered::with('attendance_student')->where('phone', 'like', '%' . $lastFourDigits)->where('birth_date' , '=' , $birth_date)->first();

        

     
        return view('profile.index', compact('registered' , 'attend'));

    }
}
