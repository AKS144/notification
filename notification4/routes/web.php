<?php

use App\User;
use App\Notifications\TaskCompleted;
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

   // $user = User::find(1);
    User::find(1)->notify(new TaskCompleted);
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/markread',function(){
    Auth::user()->unreadNotifications->markAsRead();
    return redirect()->back();//redirect to same page
})->name('markRead');
