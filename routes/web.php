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

//@include("Emad.php");
//@include("Fadhil.php");
//@include("Ahmed.php");

//@include("ControlPanel.php");

Route::get("/", "MainController@index");
Route::get("/select-language", "MainController@selectLanguage");
Route::get("/register", "UserController@register");
Route::post("/register", "UserController@registerValidation");
Route::get("/login", "UserController@login");
Route::post("/login", "UserController@loginValidation");
Route::get("/logout", "UserController@logout");


Route::get("/", "PointController@main" );

Route::get('/list/{c}', "PointController@index");
Route::get('/map' , 'PointController@shwoMaps');

Route::get("/new_family", "ControlPanelController@new_point");

Route::post('/nearby', "ControlPanelController@nearby");

Route::post('/nearone', "ControlPanelController@nearone");
Route::post('/family_search', "ControlPanelController@family_search");
Route::get('/my_activity', "ControlPanelController@my_activity");

Route::post("/123456789123456789/insert_point", "ControlPanelController@insert_point");

Route::get("/123456789123456789/all_point", "ControlPanelController@all_point");
Route::get("/contact", "ControlPanelController@contact");
Route::get("/validate/{id}", "ControlPanelController@valid_point");

Route::get("/123456789123456789/edit_point/{id}", "ControlPanelController@edit_point");
Route::post("/123456789123456789/update_point/{id}", "ControlPanelController@update_point");

Route::get("/123456789123456789/ensure_delete/{id}", "ControlPanelController@ensure_delete");
Route::get("/123456789123456789/delete_point/{id}", "ControlPanelController@delete_point");

Route::get("/jsdlfdslfflsdfflrjjdkrkjd24324234admin_register", "UserController@register2");
Route::get("/my_family", "ControlPanelController@my_family");
Route::get("/single/{id}", "ControlPanelController@single");
Route::get("/arrived_now/{id}", "ControlPanelController@arrived_now");
Route::get("/my_team", "UserController@my_team");

Route::post("/change_name", "UserController@change_name");

