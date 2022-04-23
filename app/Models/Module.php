<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'module', 'filename', 'description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
