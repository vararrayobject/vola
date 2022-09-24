<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Notifications\Notifiable;
// use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory;

    protected $guarded = [];

    protected $primaryKey = 'id';
    protected $keyType = 'string';

    public $timestamps = false;

    public function userProfile()
    {
        return $this->hasOne(UserProfile::class, 'userId');
    }
}
