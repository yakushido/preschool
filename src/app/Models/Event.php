<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'content'
    ];

    public function evenrdates()
    {
        return $this->hasMany('App\Models\EventDate');
    }
}
