<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uniform extends Model
{
    use HasFactory;

    
    protected $fillable = ['branch_id' , 'academy_id' ,'registerd_id' ,'order_date' ,'size' , 'amount' , 'branch_status', 'office_status' , 'note' , 'p_method' ];
    public function student_uniform()
    {
        return $this->belongsTo(\App\Models\Admin\Registered::class,'registerd_id');
    }
}    


  

