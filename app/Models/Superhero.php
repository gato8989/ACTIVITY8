<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Superhero extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'real_name',
        'hero_name',
        'photo_path',
        'additional_info'
    ];

    public function getPhotoUrlAttribute()
    {
        return $this->photo_path ? asset('storage/'.$this->photo_path) : null;
    }
}
