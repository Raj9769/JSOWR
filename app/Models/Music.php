<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    use HasFactory;

    protected $uploads = '/music/';

    protected $guarded = [];

    public function getFileAttribute($photo)
    {

        return $this->uploads . $photo;

    }
}
