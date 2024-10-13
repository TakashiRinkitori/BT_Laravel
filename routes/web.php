<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;


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
    return view('admin.login');
});

Route::prefix('admin')->group(function() {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout'])->name('admin.logout');

    Route::middleware('auth:admin')->group(function() {
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        //Admin
        Route::name('admin.')->prefix('admins')->group(function () {
            Route::get('/', [AdminController::class, 'index'])->name('index');
            Route::get('/create', [AdminController::class, 'create'])->name('create');
            Route::post('/', [AdminController::class, 'store'])->name('store');
            Route::get('{user}/edit', [AdminController::class, 'edit'])->name('edit');
            Route::put('{user}', [AdminController::class, 'update'])->name('update');
            Route::delete('{user}', [AdminController::class, 'destroy'])->name('destroy');

        });
        //User
        Route::name('admin.users.')->prefix('users')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::get('/create', [UserController::class, 'create'])->name('create');
            Route::post('/', [UserController::class, 'store'])->name('store');
            Route::get('{user}/edit', [UserController::class, 'edit'])->name('edit');
            Route::put('{user}', [UserController::class, 'update'])->name('update');
            Route::delete('{user}', [UserController::class, 'destroy'])->name('destroy');

        });
        //Task
        Route::name('tasks.')->prefix('tasks')->group(function(){
            Route::get('/search', [TaskController::class, 'search'])->name('search');
            Route::get('/', [TaskController::class, 'index'])->name('index');
            Route::get('/create', [TaskController::class, 'create'])->name('create');
            Route::post('/store', [TaskController::class, 'store'])->name('store');
            Route::get('/edit/{task}', [TaskController::class, 'edit'])->name('edit');
            Route::put('/update/{task}', [TaskController::class, 'update'])->name('update');
            Route::delete('/delete/{task}', [TaskController::class, 'destroy'])->name('destroy');
        });
        //Project
        Route::name('projects.')->prefix('project')->group(function () {
            Route::get('/', [ProjectController::class, 'index'])->name('index');
            Route::get('/add', [ProjectController::class, 'create'])->name('create');
            Route::post('/save', [ProjectController::class, 'store'])->name('store');
            Route::get('/edit/{project}', [ProjectController::class, 'edit'])->name('edit');
            Route::put('/update/{project}', [ProjectController::class, 'update'])->name('update');
            Route::delete('/delete/{project}', [ProjectController::class, 'destroy'])->name('destroy');
        });

    });
});



