<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = "account";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'info_id', 'username', 'password', 'access_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profiles()
    {
        return $this->hasOne('App\UserProfile', 'id', 'info_id');
    }

    public function roles()
    {
        return $this->hasOne('App\AccountRole', 'id', 'access_id');
    }
}
