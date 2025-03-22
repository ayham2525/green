<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academy extends Model
{
    use HasFactory;

    protected $fillable = ['academy_name', 'branch_id'];



    public function branche()
    {
    	return $this->belongsTo(\App\Models\Admin\Branches::class,'branch_id');
    }



    public function program()
    {
        return $this->hasMany(Programs::class,'academy_id');
    }



    
    public function student_academy(){
        return $this->hasMany(\App\Models\Admin\Registered::class, 'academy_id');
    
    }




}
