<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['title'=>'News']);
        Category::create(['title'=>'Tests']);

        foreach(Category::all() as $category){
        	for($i = 1; $i <= 5; $i++){
        		Category::create(['title'=> $category->title . $i, 'parent_id' => $category->id]);	
        	}
        	
        }
    }
}
