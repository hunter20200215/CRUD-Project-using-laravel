<?php

namespace App\Services;

use App\Category;

class CategoryService
{
	public function rootCategories(){
		// return Category::rootCategories()->get();
		return Category::whereNull('parent_id')->get();
	}

	public function subCategories($parent_id){
		return Category::where('parent_id', $parent_id)->get();
	}
}