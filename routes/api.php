<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerExample;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:sanctum'], function() {
    // список всех сообщений
    Route::get('posts', [ControllerExample::class, 'post']);
    // получить сообщение
    Route::get('posts/{id}', [ControllerExample::class, 'singlePost']);
    // добавить сообщение
    Route::post('posts', [ControllerExample::class, 'createPost']);
    // обновить сообщение
    Route::put('posts/{id}', [ControllerExample::class, 'updatePost']);
    // удалить сообщение
    Route::delete('posts/{id}', [ControllerExample::class, 'deletePost']);
    // добавить нового пользователя с ролью Writer
    Route::post('users/writer', [ControllerExample::class, 'createWriter']);
    // добавить нового пользователя с Subscriber 
    Route::post(
        'users/subscriber',
        [ControllerExample::class, 'createSubscriber']
    );
    // удалить пользователя
    Route::delete('users/{id}', [ControllerExample::class, 'deleteUser']);
});
