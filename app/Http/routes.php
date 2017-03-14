<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//lib untuk hak akses admin
use App\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web']], function () {
	Route::get('/', function () {
	    return view('welcome');
	});

	Route::auth();

	Route::get('/home', 'HomeController@index');	    

});


//rute untuk user admin
Route::group(['middleware' => 'cekAdmin'], function() {

  Route::get('khususadmin', function(){

		echo "admin khusus";
	})->middleware('cekAdmin');

  Route::resource('artikel', 'ArtikelController');

  Route::get('artikel/edit/{id}', 'ArtikelController@edit');
  Route::post('artikel/update/{id}', 'ArtikelController@update');

});



Route::resource('blog', 'BlogController');

Route::resource('crud', 'CrudController');

//rute untuk hapus data
Route::get('/delete/{id}', 'CrudController@destroy');
Route::get('/edit/{id}', 'CrudController@edit');
Route::post('/update/{id}', 'CrudController@update');
//rute untuk pencarian data
Route::get('query', 'CariController@search');

//memangil dengan menggunakan tag seo
Route::get('/read/{slug}', 'CrudController@show');

Route::get('/read/{id}', 'CrudController@manual');

Route::get('/blog', 'CrudController@lihat_data');
