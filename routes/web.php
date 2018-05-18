<?php
use Illuminate\Http\Request;
use App\Person;
use App\BrgyInfo;
use App\BrgyWorkers;
use App\Purok;
use App\Http\Resources\ResidentCollection;
use App\Http\Resources\BarangayCollection;

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
	Route::get('/test', 'HouseholdController@test');
	Route::get('/population/{option}', 'PopulationController@population');
	Route::get('/resident_profile', 'ResidentController@profile');
	Route::post('/household/member/{option}', 'HouseholdController@set')->name('set_household');
	Route::post('/household/set/{option}', 'HouseholdController@member')->name('household_member');
	Route::get('/household/get/{option}', 'HouseholdController@get')->name('member_queue');
	
	Route::get('data/resident', function(Request $request) {
		if($q = $request->q) {
			$query = Person::select(DB::raw('CONCAT(firstName, " ", midName, " ", lastName) as name'), 'id')
						->where(DB::raw('CONCAT_WS(" ", firstName, midName, lastName)'), 'like', '%'.$q.'%')
						->Orwhere(DB::raw('CONCAT_WS(" ", firstName, lastName)'), 'like', '%'.$q.'%')
						->Orwhere(DB::raw('CONCAT_WS(" ", midName, lastName)'), 'like', '%'.$q.'%')
						->limit(10)
						->get();
		} else if($id = $request->id) {
			$query = Person::where('id', $id)
						->limit(1)
						->get();
		}else {
			$query = Person::all();
		}
	
		return new ResidentCollection($query);
	});
});

Route::middleware(['ajax'])->group(function() {
	Route::get('/home', 'HomeController@index')->name('home');
  	Route::post('/add_resident', 'residentController@store');
	Route::get('/update_resident', 'ResidentController@updatedata');
	Route::post('/post_update', 'ResidentController@updateResident');
	Route::post('/add_mch', 'residentController@addMch');
	Route::post('/add_pp', 'residentController@addpp');
	Route::post('/add_walkin', 'residentController@addWalkin');
	Route::post('/add_epi', 'residentController@addepi');
	Route::post('/add_ufc', 'residentController@addufc');
	Route::post('/add_fp', 'residentController@addfp');
	Route::post('/add_cdd', 'residentController@addcdd');
	Route::post('/add_mortality', 'residentController@addmortality');
	Route::post('/add_cari', 'residentController@addcari');
	Route::post('/add_gms', 'residentController@addgms');
	Route::post('/add_bip', 'residentController@addbip');
	Route::post('/add_tb', 'residentController@addtb');
	Route::post('/add_rabies', 'residentController@addrabies');
	Route::post('/add_sanitation', 'residentController@addsanitation');
	Route::get('/household', 'HouseholdController@index')->name('household');
	Route::get('/account', 'UserAccountController@index')->name('account');
	Route::get('/resident', 'ResidentController@index')->name('resident');
	Route::get('/monthly_report', 'ReportController@index')->name('monthly_report');
	Route::get('/quarterly_report', 'ReportController@quarterlyView')->name('quarterly_report');
	Route::get('/users', 'UserAccountController@get');
});
