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
        'datetime',
        'max_attendees',
        'quantity_available',
    ];
    public function price()
    {
        return $this->hasOne(Price::class);
    }
    public function booking()
    {
        return $this->hasMany(Booking::class);
    }
    // public function delete()
    // {
    //     Booking::where('event_id',$this->id)->delete();
    //     Price::where('event_id',$this->id)->delete();
    //     return parent::delete();
    // }
}
