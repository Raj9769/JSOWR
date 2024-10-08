<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $uploads = '/eventimg/';
    public function getFileAttribute($photo)
    {

        return $this->uploads . $photo;

    }
}
