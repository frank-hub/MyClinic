<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'start',
        'illness',
    ];
}
