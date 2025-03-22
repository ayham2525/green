<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programs extends Model
{
    use HasFactory;

    protected $fillable = ['programe_name' , 'classes' , 'days' , 'price' ,
     'from_sunday' ,  'to_sunday' ,  'from_monday' ,  'to_monday' ,  'from_tuesday' ,  'to_tuesday' ,  'from_wednesday' ,  'to_wednesday' ,
       'from_thursday' ,  'to_thursday' ,  'from_friday' ,  'to_friday' ,  'from_saturday' ,  'to_saturday' , 'academy_id'
      
    
    ];


    public function academy_program()
    {
        return $this->belongsTo(Academy::class,'academy_id');
    }


    public function student_program(){
        return $this->hasMany(\App\Models\Admin\Registered::class, 'programe_id');
    
    }



}
