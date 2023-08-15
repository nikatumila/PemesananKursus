<?php

// app/Models/User.php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'role', 'member',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Method untuk mengecek apakah user memiliki role admin
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    // Method untuk mengecek jenis member user
// app/Models/User.php

public function isMember($memberType = null)
{
    if ($memberType === null) {
        return !is_null($this->member);
    }

    return $this->member === $memberType;
}


    // Konstanta jenis member
    const MEMBER_NON = 'Non Member';
    const MEMBER_SILVER = 'Silver';
    const MEMBER_GOLD = 'Gold';
    const MEMBER_PLATINUM = 'Platinum';
}

