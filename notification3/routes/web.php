<?php


use App\User;
use Illuminate\Support\Carbon;
use App\Notifications\TaskCompleted;
use Illuminate\Support\Facades\Notification;

Route::get('/', function () {

    //method1
    //User::find(1)->notify(new TaskCompleted);
    //or
    //method2
    /*$users = User::find(1);
    Notification::send($users, new TaskCompleted());

    //delay
    $when = now()->addSeconds(10);
    User::find(1)->notify((new TaskCompleted)->delay($when));*/

    //on-demand notification    
    $user = User::find(1);
    Notification::route('mail', 'taylor@example.com')
            ->notify(new TaskCompleted($user));

    //mail notification

    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

