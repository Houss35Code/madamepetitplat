<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Digipad extends Model
{
    protected $table = 'digipad';

    protected $fillable = [
        'titre',
        'url',
        'description',
        'ordre',
        'visible',
    ];

    protected $casts = [
        'visible' => 'boolean',
    ];
}
