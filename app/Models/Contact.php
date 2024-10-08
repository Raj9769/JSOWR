<?php

namespace App\Models;

use App\Mail\ContactMail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mail;

class Contact extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function boot()
    {

        parent::boot();

        static::created(function ($item) {

            $adminEmail = "trivediraj4@gmail.com";
            Mail::to($adminEmail)->send(new ContactMail($item));
        });
    }
}
