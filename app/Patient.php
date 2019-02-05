<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //
    protected $fillable = [
        'name',
        'email',
        'number',
        'occupation',
        'password',
        'phone',
        'area',
    ];
}
