<?php

use App\Http\Controllers\ForumTopicController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
    return view('index.index');
})->name('index');

Route::get('/forum', [ForumTopicController::class, 'index'])
    ->name('forum');

Route::get('/forum/{topicId}', [ForumTopicController::class, 'getTopic'])
    ->name('topic');

Route::post('/forum', [ForumTopicController::class, 'addTopic'])
    ->name('add-topic')
    ->middleware(['auth', 'isadmin']);

Route::post('/forum/{topicId}', [ForumTopicController::class, 'addComment'])
    ->name('add-comment')
    ->middleware(['auth', 'isadmin']);

Route::get('/users', [UserController::class, 'index'])
    ->name('user-list')
    ->middleware(['auth', 'isadmin']);

Route::get('/user/{userId}', [UserController::class, 'userDetails'])
    ->name('user-detail')
    ->middleware(['auth', 'isadmin']);

Route::post('/user/{userId}', [UserController::class, 'modifyUser'])
    ->name('update-user')
    ->middleware(['auth', 'isadmin']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
