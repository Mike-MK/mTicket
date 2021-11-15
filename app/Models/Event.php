<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'venue',
        'max_attendees',
        'quantity_available',
    ];
    public function price()
    {
        return $this->hasOne(Price::class);
    }
}
