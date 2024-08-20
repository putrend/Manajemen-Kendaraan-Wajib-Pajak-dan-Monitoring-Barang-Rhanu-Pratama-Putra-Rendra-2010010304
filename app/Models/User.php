<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
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
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function setPasswordAttribute($password)
    {
        return $this->attributes['password'] = bcrypt($password);
    }

    function kerusakan()
    {
        return $this->hasMany(Kerusakan::class);
    }

    function kehilangan()
    {
        return $this->hasMany(Kehilangan::class);
    }

    function perbaikan()
    {
        return $this->hasMany(Perbaikan::class);
    }

    function barangkeluar()
    {
        return $this->hasMany(Barangkeluar::class);
    }

    // Function Section
    public function isAdmin()
    {
        return $this->role == 1;
    }

    public function isUPPD()
    {
        return $this->role == 2;
    }

    public function isSamsat()
    {
        return $this->role == 3;
    }
}
