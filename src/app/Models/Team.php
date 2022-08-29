<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function Photos()
    {
        return $this->hasMany('App\Models\Photo');
    }

    public function Teachers()
    {
        return $this->hasMany('App\Models\Teacher');
    }

    public function Users()
    {
        return $this->hasMany('App\Models\User');
    }
}
