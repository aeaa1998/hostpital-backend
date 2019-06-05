<?php

use Illuminate\Http\Request;

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
Route::apiResource('/users', 'UsersController');
Route::post('get/token', 'Api\AccessTokenController@issueToken');
Route::get('/dates/{user_id}/{is_doctor}', 'DatesController@datesByUser');
Route::get('/pending/dates/{user_id}/{is_doctor}', 'DatesController@datesPending');
Route::get('/all/dates/{user_id}/{is_doctor}', 'DatesController@allProcesedDates');
Route::get('/all/doctors/{user_id}/{is_doctor}', 'DoctorsController@getAllDoctors');
Route::get('/all/patients/doctor/{user_id}/{is_doctor}', 'PatientsController@getAllPatients');
Route::get('/check/available/{user_id}/{is_doctor}', 'PatientsController@getAllPatients');
Route::apiResource('/dates', 'DatesController');
Route::apiResource('/doctors', 'DoctorsController');
Route::middleware('auth:api')->get('/user', function (Request $request) {
	return $request->user();
});
Route::group(['middleware' => 'auth:api'], function () {
	Route::resource('/doctors', 'DoctorsController');
});
