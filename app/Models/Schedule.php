<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'activity', 'date', 'time_start', 'time_ended', 'place', 'present_code'
    ];

    public function presence()
    {
        return $this->hasMany(Presence::class);
    }
}
