<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function attendees()
    {
        return $this->belongsToMany(User::class, 'user_events_attendees', 'event_id', 'user_id');
    }


    public function attendeesUsers()
    {
        return $this->hasManyThrough(User::class, UserEventsAttendee::class, 'event_id', 'id', 'id', 'user_id');
    }
}
