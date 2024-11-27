<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;
use App\Models\Sales;
use App\Models\Student;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Mail;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Middleware\CheckAge;
use App\Http\Controllers\UserController;
use App\Http\Controllers\testController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\JoinOrderController;
use App\Http\Controllers\OrderController;

// 定义路由
    Route::get('/posts', [PostController::class, 'index']);

    Route::get('/sales', function (){
        return response()->json(Sales::all());
    });


Route::get('/student', function (){
    return response()->json(Student::all());
})->middleware(EnsureTokenIsValid::class.':editor');

Route ::resource('articles', ArticleController::class)
->middleware(EnsureTokenIsValid::class);

Route::get('sendMail', function () {
    Mail::to('cr870406@gmail.com')->send(new \App\Mail\FirstMail);
});


Route::any('/test', testController::class)->name('server');

Route::middleware([CheckAge::class.':hi'])->group(function (){
    Route::get('m',function(){
        return categories();
    });
});

// ----------------------------------------------------------------
//首頁
Route::get('/',[IndexController::class, 'index']);

//改變文章狀態，發布或不發佈
Route::patch('/blog/{id}',[BlogController::class, 'status'])->name('blog.status');

Route::get('/users/{user}',function(\App\Models\Blog $user){
 return response()->json($user);
});

//資源路由
Route::resource('blog',BlogController::class);

Route::prefix('user')->name('user.')->group(function (){
    //個人中心頁面
    Route::get('/', [UserController::class,'infopage'])->name('info');

    //修改個人信息
    Route::put('/', [UserController::class,'infoUpdate'])->name('info.update');

    //更換頭像頁面
    Route::get('/avatar', [UserController::class,'avatarpage'])->name('avatar');

    //更換頭像
    Route::put('/avatar', [UserController::class,'avatarUpdate'])->name('avatar.update');

    //個人中心-我的
    Route::get('/blog', [UserController::class,'blog'])->name('blog');
});

// 評論
Route::post('/blog/{blog}/comments', CommentController::class)->name('blog.comment');

// 訂單系統-------------------------------------------------------------------------------------------------------------------------

//發起訂單
Route::resource('order', OrderController::class);

//團員加入訂單
Route::resource('joinOrder', JoinOrderController::class);