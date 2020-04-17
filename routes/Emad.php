<?php
/**
 * Created by PhpStorm.
 * User: Emad
 * Date: 7/31/2018
 * Time: 9:45 AM
 */


Route::get('/visitor-feqh', "QuestionController@index")->middleware("setLocaleLanguage");
Route::get('/visitor-feqh/img/{name}', "QuestionController@showImage")->middleware("setLocaleLanguage");