<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\Auth\UpdateController;

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
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::get('/profil', 'HomeController@update')->name('update');
Route::post('/profil', 'Auth\UpdateController@Updatelist')->name('update');
Route::resource('myannonce', 'MyAnnonceController');
Route::resource('annonce', 'AnnonceController');

/* Route::get('/home/profil/myposting', 'AnnonceController@index')->name('myposting'); */
/* Route::get('/home/annonces', 'AnnonceController@index')->name('annonce'); */
/* Route::get('/home/profil/create_posting', 'AnnonceController@create')->name('create_posting'); */
/* Route::post('/home/profil/update/upload', 'AnnonceController@store')->name('upload');
Route::get('home/profil/posting', function () {
    return AnnonceController::show(Auth::user()->id);
})->name('myposting');
Route::get('/home/profil/posting/{id}', 'AnnonceController@updatepage');
Route::post('/home/profil/posting/update/{id}', 'AnnonceController@update')->name('update_posting'); */