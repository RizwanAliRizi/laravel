<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable=[
    	'address'
    ];

    public function customer(){
	return $this->belongsTo(App\customers::class);
}

}
