<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $guarded = [
        'is_admin',
    ];

    public function ukm()
    {
        return $this->hasMany('App\Ukm');
    }

    public function contact()
    {
        return $this->hasMany('App\Ukm');
    }

    public function isAdmin()
    {
        return $this->is_admin; // this looks for an admin column in your users table
    }
}
