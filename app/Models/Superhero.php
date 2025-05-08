<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Superhero extends Model
{
    protected $fillable = [
        'real_name',
        'hero_name',
        'photo_url',
        'additional_info'
    ];
}
