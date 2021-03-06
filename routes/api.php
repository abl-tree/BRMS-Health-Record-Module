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
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* ../data/webapi/ */
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/barangay', function(Request $request) {
    if($q = $request->q) {
        $query = BrgyInfo::where('brgy_name', 'like', '%'.$q.'%')->with('purok')->get(['brgy_name as name', 'barangay_info.*']);
        
        return new BarangayCollection($query);
    } else {
        $query = BrgyInfo::all();
    }

    return new BarangayCollection($query);
});

Route::get('/purok/{brgy_id?}', function(Request $request, $brgy_id = null) {
    if($brgy_id) {
        $query = BrgyInfo::find($brgy_id)->purok()->get();
    } else {
        $query = Purok::all();
    }

    return new BarangayCollection($query);
});

Route::get('/worker', function(Request $request) {
    if($q = $request->q) {
        $q = '%'.$q.'%';
        $query = BrgyWorkers::select(DB::raw('CONCAT(firstname, " ", lastname) as name'), 'type', 'id')
                    ->where(DB::raw('CONCAT_WS(" ", firstname, lastname)'), 'like', $q)
                    ->get();
    } else {
        $query = BrgyWorkers::all();
    }

    return new BarangayCollection($query);
});