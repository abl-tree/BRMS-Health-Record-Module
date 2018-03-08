<?php

use Illuminate\Http\Request;
use App\Person;
use App\BrgyInfo;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/resident', function() {
    return new ResidentCollection(Person::all());
});

Route::get('/barangay', function() {
    return new BarangayCollection(BrgyInfo::all());
});