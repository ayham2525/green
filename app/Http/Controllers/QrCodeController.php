<?php

namespace App\Http\Controllers;


use App\Models\Admin\Attendance;

use Illuminate\Http\Request;

class QrCodeController extends Controller
{
    public function scan()
    {
        return view('admin.qr.scan');
    }


    public function scansave(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'date' => 'required',
            'time' => 'required',

      
 
         ]);
    


          $registered =  Attendance::create($request->all());

          
        return redirect('scan')
        ->with('success','Attendance created successfully.');
    }
}
