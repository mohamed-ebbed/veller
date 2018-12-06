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

Route::get('/', function () {
 	$x = "";
    return view('welcome');
});

Auth::routes();
//Route::get('/RegisterAsOrg', 'HomeController@index');
//Route::get('/RegisterAsUser', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');

Route::resource("support_tickets" , "supportTicketController");
Route::resource("users" , "userController");
Route::resource("contests" , "contestController")->except(["show" , "create" , "edit"]);
Route::resource("supervisors" , "supervisorController");

Route::resource("education" , "educationController")->except(["index","show" , "create" , "edit"]);
Route::resource("applicant" , "applicantController")->except(["index","show" , "create" , "edit"]);
Route::resource("volunteering" , "volunteeringController")->except(["index","show" , "create" , "edit"]);
Route::resource("scholarship" , "scholarshipController")->except(["index","show" , "create" , "edit"]);



