<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registered extends Model
{
    use HasFactory;


    protected $fillable = ['branch_id','academy_id','programe_id','name','nationality',
    'birth_date','phone','email','address','reg_date'];


    public function academy_student()
    {
    	return $this->belongsTo(\App\Models\Admin\Academy::class,'academy_id');
    }


    
    public function branch_student()
    {
    	return $this->belongsTo(\App\Models\Admin\Branches::class,'branch_id');
    }

    
    public function program_student()
    {
    	return $this->belongsTo(\App\Models\Admin\Programs::class,'programe_id');
    }



    public function payment_student()
    {
    	return $this->hasMany(\App\Models\Admin\Instalment::class,'registerd_id');
    }



    public function attendance_student()
    {
    	return $this->hasMany(\App\Models\Admin\Attendance::class,'student_id');
    }



    
    public function uniform_student()
    {
    	return $this->hasMany(\App\Models\Admin\Uniform::class,'registerd_id');
    }


    



}
