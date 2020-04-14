<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Showpage;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {  
    return view('pages.home', ['name' => 'Dragon']);
});

Route::get('/home', function(){
	return view('pages.home');
});

Auth::routes();

Route::get('/Dashbard', 'DashboardController@index')->name('home');

Route::namespace('admin')->prefix('admin')->name('admin.')->group(function(){
	Route::resource('posts', 'PostsController');
});

Route::get('/admin/{name}', 'Showpage');

Route::get('/password/{name}', function(){
	return view('pages.home');
});

Route::get('/{name}', 'ShowPage');

Route::get('pages/home', 'HomeController@index')->name('home');



