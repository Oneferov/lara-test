<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 
        'last_name', 
        'middle_name', 
        'email', 
        'password',
        'user_type_id',
        'position_id'
    ];

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function user_type()
    {
        return $this->belongsTo(UserType::class);
    }

    public function getNameAttribute()
    {
        return $this->last_name . ' '
            . $this->first_name . ' '
            . $this->middle_name;
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
