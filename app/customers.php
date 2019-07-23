<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customers extends Model
{
    
    protected $fillable =['name','age'];

    public function company(){
    	return $this->belongsTo(company::class);
    }

    public function address(){
    	return $this->hasOne(App\Address::class);
    }
}
