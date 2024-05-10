<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        
         'name',
         'email',
         'phone',
         'gender',
         'dob',
         'doj',
         'father_name',
         'mother_name',
         'address',
         'roll_no',
        
    ];
}
