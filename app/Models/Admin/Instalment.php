<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instalment extends Model
{
    use HasFactory;
    protected $fillable = ['branch_id','academy_id', 'registerd_id' , 'payment_date' ,
    'start_date' ,'end_date' ,'amount' ,'discount', 'still' , 'pay_method' , 'note' ,'start_time' , 'end_time' , 'status_student'];



    public function academy_payment()
    {
    	return $this->belongsTo(\App\Models\Admin\Academy::class,'academy_id');
    }


    public function branch_payment()
    {
    	return $this->belongsTo(\App\Models\Admin\Branches::class,'branch_id');
    }

   

    public function student_payment()
    {
    	return $this->belongsTo(\App\Models\Admin\Registered::class,'registerd_id');
    }



}
