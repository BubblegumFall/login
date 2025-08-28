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
     * Kolom yang bisa diisi (mass assignable).
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * Kolom yang disembunyikan saat diubah jadi array/json.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casting otomatis untuk kolom tertentu.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed', // Laravel 10+ support, otomatis hash password
    ];
}
