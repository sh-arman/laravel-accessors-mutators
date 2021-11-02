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

    protected $fillable = [
        'name',
        'phone_code',
        'phone_number',
        'email',
        'password',
    ];

    // Accessor Method
    public function getPhoneAttribute() {
        return $this->phone_code . "-" . $this->phone_number;
    }

    // Mutator Method
    public function setNameAttribute($value)
    {
        return $this->attributes['name'] = ucfirst($value);
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
