<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $fillable = [
        'id',
        'name',
        'description',
        'teacher_id'
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    // public function teacher()
    // {
    //     return $this->belongsTo(Teacher::class);
    // }
}
