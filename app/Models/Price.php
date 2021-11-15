<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;
    protected $fillable = [
        'event_id',
        'regular',
        'vip',
    ];
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

}
