<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Zizaco\Entrust\EntrustPermission;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class Permission extends EntrustPermission
{
	use EntrustUserTrait;
  protected $fillable=[

    	'name',
    	'display_name',
    	'description'

    ];

    public function roles(){
    	return $this->belongsToMany(Role::class);
    }
}
