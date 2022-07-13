<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAttendance extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'attendance_id',
        'reason_id',
        'date'
    ];

    public function attendance()
    {
        return $this->belongsTo('App\Models\Attendance');
    }
    public function reason()
    {
        return $this->belongsTo('App\Models\Reason');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
