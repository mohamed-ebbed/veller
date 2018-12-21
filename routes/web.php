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
/*
Route::get('/RegisterAsOrg', function(){
	return view('auth.RegisterAsOrg');
});
Route::get('/RegisterAsUser', function(){
	return view('auth.RegisterAsUser');
});

*/


Route::get('/message', function(){
	return view('message');
});


//Route::get('/RegisterAsUser', 'HomeController@index');
Route::get('/', 'HomeController@index')->name('home');
Route::post('validate_user', ['as' => 'validate_user', 'uses' => 'loginController@user_login']);
Route::post('validate_org', ['as' => 'validate_org', 'uses' => 'loginController@org_login']);
Route::post('validate_sup', ['as' => 'validate_sup', 'uses' => 'loginController@sup_login']);

Route::resource("support_tickets" , "supportTicketController");
Route::resource("users" , "userController");
Route::resource("supervisors" , "supervisorController");

Route::resource("education" , "educationController")->except(["index","show" , "create" , "edit"]);
Route::resource("applicant" , "applicantController")->except(["index","show" , "create" , "edit"]);
Route::resource("org" , "organizationController");

Route::resource("applicable_countries" , "ApplicableCountriesController")->except(["index","show" , "create" , "edit"]);
Route::resource("apply_for" , "ApplyForController")->except(["index","show" , "create" , "edit"]);
Route::resource("interests" , "InterestsController")->except(["index","show" , "create" , "edit"]);

Route::resource("opportunity" , "opportunityController")->only(["index", "create"]);
 
Route::resource("internship" , "InternshipController")->except(["create"]);
Route::resource("volunteering" , "volunteeringController")->except(["create"]);
Route::resource("scholarship" , "scholarshipController")->except(["create"]);
Route::resource("exchange_programs" , "exchangeController")->except(["create"]);
Route::resource("contests" , "contestController")->except(["create"]);
Route::get("logout" , "loginController@logout");
Route::get("user_login" , "loginController@load_user_form");
Route::get("org_login" , "loginController@load_org_form");
Route::get("sup_login" , "loginController@load_sup_form");
Route::resource("organizations" , "organizationController");
