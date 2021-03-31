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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
/*
Route::get('/index', function () {
    return view('pages.index');
});
*/
Route::get('/','PostsController@index');

Route::get('/booked','PostsController@booked');

Route::get('/bookevent','PagesController@bookevent');

Route::get('/myevents','PostsController@myevents');

Route::get('/store','PostsController@store');

Route::get('/update_event','PagesController@update_event');

Route::get('/delete_event','PagesController@delete_event');


/*
Route::get('/booked', function () {
    return view('pages.booked');
});

Route::get('/myevents', function () {
    return view('pages.myevents');
});
*/

Route::resource('posts','PostsController');

Auth::routes();

Route::get('/index', [App\Http\Controllers\PostsController::class, 'index'])->name('index');
Route::get('/booked', [App\Http\Controllers\PagesController::class, 'booked'])->name('booked');
Route::get('/myevents', [App\Http\Controllers\PostsController::class, 'myevents'])->name('myevents');


Route::get('/store', [App\Http\Controllers\PostsController::class, 'store'])->name('store');
Route::get('/bookevent', [App\Http\Controllers\PagesController::class, 'bookevent'])->name('bookevent');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
