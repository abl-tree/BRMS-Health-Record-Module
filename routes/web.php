<?php

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

Auth::routes();

Route::middleware(['auth'])->group(function() {
    Route::get('/', function(){
        return redirect('/index');
    });
	Route::get('/index', function(){
        return view('index');		
	});
	Route::get('/test', 'UserAccountController@test');
	Route::get('/population/{option}', 'PopulationController@population');
	 Route::get('/refresh_person', 'HouseholdController@refresh')->name('refresh_person');
});

Route::middleware(['auth', 'ajax'])->group(function() {    
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/household', 'HouseholdController@index')->name('household');
	Route::get('/account', 'UserAccountController@index')->name('account');
});
