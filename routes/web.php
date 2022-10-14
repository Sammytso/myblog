<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/index', [UserController::class, 'index'])->name('user.index');

Route::prefix('user')->middleware('auth')->group(function(){

    //Route::get('/index', [UserController::class, 'index'])->name('user.index');
    Route::get('/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/store', [UserController::class, 'store']);
    Route::get('/show/{user}', [UserController::class, 'show'])->name('user.show');
    Route::get('/edit/{user}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/update/{user}', [UserController::class, 'update']);
    Route::get('/delete/{user}', [UserController::class, 'destroy'])->name('user.destroy');

    //Route::get('/registration', [UserController::class, 'registration'])->name('user.registration')->withoutMiddleware('auth');
    Route::get('/login', [UserController::class, 'login'])->name('user.login')->withoutMiddleware('auth');
    Route::post('/UserRegister', [UserController::class, 'UserRegister'])->name('UserRegister')->withoutMiddleware('auth');
    Route::get('/login-user', [UserController::class, 'userLogin'])->withoutMiddleware('auth');
    Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');

});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
