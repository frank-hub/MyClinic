<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
class Bookings extends Model
{
    use HasApiTokens;
    
    protected $fillable = [
        'name',
        'email',
        'phone',
        'start',
        'illness',
    ];
}
