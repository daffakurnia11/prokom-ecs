<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'verified',
        'student_number',
        'batch',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    public function getRouteKeyName()
    {
        return 'student_number';
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function participant()
    {
        return $this->hasOne(Participant::class);
    }

    public function announcement()
    {
        return $this->hasMany(Announcement::class);
    }

    public function presence()
    {
        return $this->hasMany(Presence::class);
    }

    public function group()
    {
        return $this->hasOne(Group::class);
    }

    public function module()
    {
        return $this->hasMany(Module::class);
    }
}
