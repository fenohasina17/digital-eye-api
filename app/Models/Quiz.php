<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    public function answers()
    {
        return $this->hasMany('App\Models\Answer', 'quiz_id');
    }
    public function student()
    {
        return $this->belongsTo('App\Models\Student', 'student_id');
    }
}
