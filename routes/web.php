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
	Route::get('/api/users', function() {
		$request = request();

		// handle sort option
		if (request()->has('sort')) {
		    list($sortCol, $sortDir) = explode('|', request()->sort);
		    $query = App\User::orderBy($sortCol, $sortDir);
		} else {
		    $query = App\User::orderBy('id', 'asc');
		}

		if ($request->exists('filter')) {
		    $query->where(function($q) use($request) {
		        $value = "%{$request->filter}%";
		        $q->where('username', 'like', $value);
		    });
		}

		$perPage = request()->has('per_page') ? (int) request()->per_page : null;

		// The headers 'Access-Control-Allow-Origin' and 'Access-Control-Allow-Methods'
		// are to allow you to call this from any domain (see CORS for more info).
		// This is for local testing only. You should not do this in production server,
		// unless you know what it means.
		return response()->json(
		        $query->paginate($perPage)
		    )->header('Access-Control-Allow-Origin', '*')
		    ->header('Access-Control-Allow-Methods', 'GET');
	});
});

Route::middleware(['auth', 'ajax'])->group(function() {    
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/household', 'HouseholdController@index')->name('household');
	Route::get('/account', 'UserAccountController@index')->name('account');
});
