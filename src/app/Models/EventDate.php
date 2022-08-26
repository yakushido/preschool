<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EventDate extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'date'
    ];

    public function event()
    {
        return $this->belongsTo('App\Models\Event');
    }

    public function getEventNameById()
    {
        return DB::table('event_dates')
        ->join('events', 'event_dates.event_id', '=', 'events.id')
        ->get();
    }
}
