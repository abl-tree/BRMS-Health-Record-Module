<?php
use Illuminate\Http\Request;

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
	Route::get('/index', function(Request $request){
		if ($page = $request->page){
			dd($page);
		}
        return view('index');		
	});
	Route::get('/test', 'UserAccountController@test');
	Route::get('/population/{option}', 'PopulationController@population');
	Route::get('/resident_profile', 'ResidentController@profile');
	Route::post('/household/member/{option}', 'HouseholdController@member')->name('household_member');
	Route::get('/household/get/{option}', 'HouseholdController@get')->name('member_queue');
});

Route::middleware(['ajax'])->group(function() {    
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/household', 'HouseholdController@index')->name('household');
	Route::get('/account', 'UserAccountController@index')->name('account');
	Route::get('/resident', 'ResidentController@index')->name('resident');
	Route::get('/monthly_report', 'ReportController@index')->name('monthly_report');
	Route::get('/quarterly_report', 'ReportController@quarterlyView')->name('quarterly_report');
});
