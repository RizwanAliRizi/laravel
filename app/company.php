<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class company extends Model
{
     

     protected $fillable = [
       'name',
       'phone'      
    ];
    
    public $timestamps = true;

    public function customers(){
    	return $this->hasMany(customers::class);
    }

    
}
