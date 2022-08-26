<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_id',
        'img_path'
    ];

    public function team()
    {
        return $this->belongsTo('App\Models\Team');
    }

}
