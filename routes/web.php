<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReplyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/* TODO
Сформировать группы(разобраться , написать Диме)
Закончить комментарии(миграция , модель , контроллеры, рауты, посмотреть как привязать к посту)
Прочитать как писать код(отступы и тд.)
Попробовать довести до ума фронт
Закончить реплаи и проверить
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/blog', [PostController::class, 'index']);
Route::get('/blog/{post}', [PostController::class,'show']);

Route::controller(PostController::class)->group(function () {
    Route::delete('post-delete/{post}', 'destroy');
    Route::get('post-edit/{post}', 'edit');
    Route::put('post-update/{post}', 'update');
});
Route::post('store-form',[PostController::class, 'store']);

Route::controller(CommentController::class)->group(function() {
    Route::post('comment-store/{post}','store')->name('comment.save');
    Route::delete('comment-delete/{comment}', 'destroy');
    Route::post('comment-reply/{comment}','reply')->name('comment.reply');
    Route::get('reply-create/{comment}','create')->name('reply.create');
});



