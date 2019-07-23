<?php

namespace App;

use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use EntrustUserTrait;

    // use SoftDeletes, EntrustUserTrait {
    //     SoftDeletes::restore insteadof EntrustUserTrait;
    //     EntrustUserTrait::restore insteadof SoftDeletes;
    // }

    // use EntrustUserTrait;
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

    public function socialProviders(){
        return $this->hasMany(SocialProvider::class);
    }

    public function is_admin(){

        return $this->admin;
    }

    public function roles(){
        return $this->belongsToMany(Role::class);
    }


}
