<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

    public function sub_categories()
    {
    	return $this->hasMany('App\Category', 'parent_id', 'id');
    }

    public function scopeRootCategories($query){
    	return $query->whereNull('parent_id');
    }

    public function posts(){
    	return $this->hasMany('App\Post', 'category_id', 'id');
    }
}
