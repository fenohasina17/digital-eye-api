<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    public function quizzes()
    {
        return $this->hasMany('App\Models\Quiz', 'student_id');
    }
    public function parent()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
