<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function description(){
    	return $this->hasOne('App\Description')->withDefault();
    }

    public function setSubjectAttribute($value)
    {
    	$this->attributes['subject'] = $value;
        $this->attributes['slug'] = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $value)));
    }

    public function category(){
    	return $this->belongsTo('App\Category', 'category_id', 'id');
    }

    public function owner(){
    	return $this->belongsTo('App\User', 'created_by', 'id')->withDefault();
    }
}
