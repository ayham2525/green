<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = ['student_id' , 'date' , 'time' , 'note'];



    public function student_attendance()
    {
    	return $this->belongsTo(\App\Models\Admin\Registered::class,'student_id');
    }
    
}

