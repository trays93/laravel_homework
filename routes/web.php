<?php

use App\Http\Controllers\ForumTopicController;
use App\Http\Controllers\LoginController;
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

Route::get('/login', function() {
    return view('login.login', []);
})->name('login');

Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])
    ->name('logout');

Route::get('/register', function() {
    return view('index.register');
})->name('register');

Route::get('/forum', [ForumTopicController::class, 'index'])
    ->name('forum');
    
Route::get('/forum/{topicId}', [ForumTopicController::class, 'getTopic'])
    ->name('topic');

Route::post('/forum', [ForumTopicController::class, 'addTopic'])
    ->name('add-topic')->middleware('auth');

Route::post('/forum/{topicId}', [ForumTopicController::class, 'addComment'])
    ->name('add-comment')->middleware('auth');
