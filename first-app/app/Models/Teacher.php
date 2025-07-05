<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teacher';
    
    protected $fillable = [
        'id',
        'name',
        'email',
        'subject',
        'phone',
        'address',
        'age',
        'experience',
        'joining_date'
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}