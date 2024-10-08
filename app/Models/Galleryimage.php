<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galleryimage extends Model
{
    use HasFactory;

    protected $uploads = '/galleryimg/';

    protected $guarded = [];

    public function getFileAttribute($photo){

        return $this->uploads . $photo;

    }
}
