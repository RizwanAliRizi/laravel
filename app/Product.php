<?php

namespace App;
use App\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

	protected $fillable =[

		'name',
		'price',
		'file'
	];
    //
    public function categories(){
    	return $this->belongsToMany(Category::class)->withTimestamps();
    }
}
