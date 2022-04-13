<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'profile_pict',
        'university',
        'major',
        'line_id',
        'whatsapp',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
