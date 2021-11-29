<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;



    protected $redirectTo = '/login';

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
    public function state()
    {
        return $this->belongsTo(State::class);
    }
    public function prefix()
    {
        return $this->belongsTo(Prefix::class);
    }

    public function last_visit()
    {
        $visits = Visits::where([
            ['user_type', 'User'],
            ['user_id', $this->id]
        ])->latest('id')->first();
        if ($visits) {
            return $visits->date;
        } else {
            return '-----';
        }
    }

    public function gancxadebebi()
    {
        return $this->hasMany(Ganacxadi::class);
    }
}
