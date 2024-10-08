<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function clients()
    {
        return $this->belongsTo(Client::class);
    }

    public function events()
    {
        return $this->belongsTo(Event::class);
    }
}
