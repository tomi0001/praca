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
    return view('welcome');
//print "dobrze";
});
Route::get('rejestracja','Controller@register');
Route::post('rejestracja2','Controller@register2');
Route::post('login','Controller@login');
Route::get('/wyloguj','Controller@logout');
Route::get('/blad','Controller@error');
Route::get('/sukces','Controller@sukces');
Route::get('/registration_succes','Controller@registration_succes');
Route::get('add_work','Controller@add_work');
Route::post('add_work2','Controller@add_work2');
Route::get('watch_work/{work?}','Controller@watch_work2');
Route::get('watch_work2','Controller@watch_work');
Route::get('setting','Controller@setting');
Route::post('setting2','Controller@setting2');
Route::get('apply','Controller@apply');
Route::post('write_comments','Controller@write_comments');
Route::get('notifications','Controller@notifications');
Route::get('read_notifications','Controller@read_notifications2');