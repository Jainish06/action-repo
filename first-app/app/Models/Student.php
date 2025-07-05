<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'student';
    
    protected $fillable = [
        'id',
        'name',
        'dob',
        'email',
        'phone',
        'address',
        'blood_group'
    ];

    // Since your timestamp columns are create_at and updated_at
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}