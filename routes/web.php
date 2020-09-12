<?php

use Illuminate\Support\Facades\Route;

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
    return redirect('login');
});

// Route::group(['middleware' => ['auth']], function(){
//     Route::resource('post', 'PostController');
//     Route::get('addUser', 'UserController@index')->name('add.user');
//     Route::post('saveUser', 'UserController@saveUser')->name('save.user');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');