<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
Use MongoDB\Laravel\Eloquent\Model as Eloquent;

class Event extends Eloquent
{
    protected $connection = 'mongodb'; 
    protected $collection = 'events';

    protected $fillable = [
        'eventName',
        'eventType',
        'ticketPrice',
        'eventDate',
        'eventTime',
        'endTime',
        'eventVenue',
        'eventDescription',
        'artists',
        'imagePath',
    ];
}