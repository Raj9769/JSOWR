<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $uploads = '/book/';

    protected $guarded = [];

    public function getFileAttribute($photo)
    {

        return $this->uploads . $photo;

    }
}
