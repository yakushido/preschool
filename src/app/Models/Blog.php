<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'img_path'
    ];

    public function Evaluations()
    {
        return $this->hasMany('App\Models\Evaluation');
    }
}
