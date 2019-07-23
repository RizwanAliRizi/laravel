<?php

namespace App;

use Zizaco\Entrust\EntrustRole;
use Illuminate\Database\Eloquent\Model;
 
class Role extends EntrustRole
{
     // use EntrustUserTrait;
     protected $fillable=[

    	'name',
    	'display_name',
    	'description'
    ];

    public function users(){
    	return $this->belongsToMany(User::class);
    }

    public function permissions(){
    	return $this->belongsToMany(Permission::class);
    }
}
