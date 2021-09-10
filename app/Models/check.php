<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class check extends Model
{
    use HasFactory;


    protected $fillable = [
        'hing_temperature', 
        'daily_reminder', 
        'unauthorized_person', 
        'temporary_person', 
        'stranger_alert', 
        'incorrect_bus', 
        'on_bus', 
        'enter_school',
        'leave_school',
        'absent_student'
    ];

    public function setCategoryAttribute($value)
    {
        $this->attributes['name'] = json_encode($value);
    }

    public function getCategoryAttribute($value)
    {
        return $this->attributes['name'] = json_decode($value);
    }
}
