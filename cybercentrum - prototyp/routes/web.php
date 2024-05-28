<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\LogowanieController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\SesjaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\User; // Importowanie modelu User, jeśli jeszcze tego nie zrobiłeś



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

Route::get('/', [MainController::class, 'index']);
Route::get('/login', [LogowanieController::class, 'showLoginForm'])->name('login');
Route::post('/login',[LogowanieController::class, 'login']);
Route::get('/register', [LogowanieController::class, 'showRegisterForm'])->name('register');
Route::post('/register',[LogowanieController::class, 'register']);


//po zalogowaniu

Route::get('/dashboard', [SesjaController::class, 'index'])->middleware('auth');
Route::get('/logout', [LogowanieController::class, 'logout'])->name('logout');

Route::get('/user/{id}', [UserController::class, 'show'])->name('user.profile');
Route::post('/user/update/{id}', [UserController::class, 'update'])->middleware('auth')->name('user.update');

Route::get('/user', [UserController::class, 'index'])->middleware('auth')->name('user.index');

//moderowanie i banowanie
use App\Http\Controllers\UserBanController;
use App\Http\Controllers\UserManagementController;

//Route::get('/user/{id}', [UserController::class, 'show'])->name('user.profile');
Route::post('/user/ban/{id}', [UserBanController::class, 'banUser'])->middleware('auth')->name('user.ban');
Route::post('/user/promote/{id}', [UserManagementController::class, 'promoteToModerator'])->middleware('auth')->name('user.promote');
Route::post('/user/demote/{id}', [UserManagementController::class, 'demoteToUser'])->middleware('auth')->name('user.demote');
Route::post('/user/unban/{id}', [UserBanController::class, 'unbanUser'])->middleware('auth')->name('user.unban');
Route::get('/user/username/{username}', [UserController::class, 'showByUsername'])->name('user.profileByUsername');

use App\Http\Controllers\PostController;

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->middleware('auth')->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->middleware('auth')->name('posts.store');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->middleware('auth')->name('posts.destroy');

use App\Http\Controllers\KomentarzController;

Route::post('/posts/{post}/komentarze', [KomentarzController::class, 'store'])->name('komentarze.store');
Route::delete('/komentarze/{komentarz}', [KomentarzController::class, 'destroy'])->name('komentarze.destroy');