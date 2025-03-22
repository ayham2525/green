<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branches extends Model
{
    use HasFactory;
    protected $fillable = ['branch_name'];



    public function academy(){
        return $this->hasMany(\App\Models\Admin\Academy::class, 'branch_id');
    
    }


    
    public function student_branch(){
        return $this->hasMany(\App\Models\Admin\Registered::class, 'branch_id');
    
    }

  


}
