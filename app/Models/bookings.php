<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model as Eloquent;

class bookings extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'bookings';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'eventType',
        'eventDate',
        'eventTime',
        'location',
        'guestCount',
        'theme',
        'budget',
        'services',
        'notes',
        'image'
    ];
}
