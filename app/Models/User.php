<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    // Constants for user roles
    const SUPERUSER = 1;
    const ADMIN = 2;
    const USER = 3;

    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Helper methods to check user roles

    public function isSuperuser()
    {
        return $this->role === self::SUPERUSER;
    }

    public function isAdmin()
    {
        return $this->role === self::ADMIN;
    }

    public function isUser()
    {
        return $this->role === self::USER;
    }
}
