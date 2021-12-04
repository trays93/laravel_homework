<?php

use App\Http\Controllers\ForumTopicController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\MessagesController;
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
    ->middleware(['auth']);

Route::post('/forum/{topicId}', [ForumTopicController::class, 'addComment'])
    ->name('add-comment')
    ->middleware(['auth']);

Route::get('/forum/modify-comment/{commentId}', [ForumTopicController::class, 'modifyComment'])
    ->name('modify-comment')
    ->middleware(['auth']);

Route::get('/forum/delete-comment/{commentId}', [ForumTopicController::class, 'deleteComment'])
    ->name('delete-comment')
    ->middleware(['auth']);

Route::post('/forum/update-comment/{commentId}', [ForumTopicController::class, 'updateComment'])
    ->name('update-comment')
    ->middleware(['auth']);

Route::get('/messages', [MessagesController::class, 'index'])
    ->name('messages')
    ->middleware('auth');

Route::get('/messages/write', [MessagesController::class, 'writeMessage'])
    ->name('write-message')
    ->middleware('auth');

Route::post('/messages/send', [MessagesController::class, 'sendMessage'])
    ->name('send-message')
    ->middleware('auth');

Route::get('/gallery', [ImageController::class, 'index'])
    ->name('images');

Route::get('/gallery/create', [ImageController::class, 'create'])
    ->name('image-create')
    ->middleware('auth');

Route::post('/gallery/upload', [ImageController::class, 'store'])
    ->name('upload-image')
    ->middleware('auth');

Route::get('/gallery/edit/{id}', [ImageController::class, 'edit'])
    ->name('show-image')
    ->middleware('auth');
    
Route::post('/gallery/edit/{id}', [ImageController::class, 'update'])
        ->name('update-image')
        ->middleware('auth');

Route::get('/gallery/delete/{id}', [ImageController::class, 'destroy'])
    ->name('delete-image')
    ->middleware('auth');

Route::get('/users', [UserController::class, 'index'])
    ->name('user-list')
    ->middleware(['auth', 'isadmin']);

Route::get('/user/create', [UserController::class, 'newUser'])
    ->name('new-user')
    ->middleware(['auth', 'isadmin']);

Route::post('/user/create', [UserController::class, 'createUser'])
    ->name('create-user')
    ->middleware(['auth', 'isadmin']);

Route::get('/user/{userId}', [UserController::class, 'userDetails'])
    ->name('user-detail')
    ->middleware(['auth', 'isadmin']);

Route::post('/user/{userId}', [UserController::class, 'modifyUser'])
    ->name('update-user')
    ->middleware(['auth', 'isadmin']);

Route::get('/user/{userId}/delete', [UserController::class, 'deleteUser'])
    ->name('delete-user')
    ->middleware(['auth', 'isadmin']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
