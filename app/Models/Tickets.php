<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model as Eloquent;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tickets extends Eloquent
{
    protected $connection = 'mongodb'; 
    protected $collection = 'tickets';

    protected $fillable = [
        'user_nic',
        'user_email',
        'user_phone',
        'event_id',
        'ticket_quantity',
        'total_price',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
