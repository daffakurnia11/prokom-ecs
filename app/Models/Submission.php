<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'group_number', 'module', 'file', 'notes', 'video'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
