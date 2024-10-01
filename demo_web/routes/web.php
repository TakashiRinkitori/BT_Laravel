<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Routing\Router;

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

Route::get('login', [AuthenticatedSessionController::class, 'create'])
     ->name('login');
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
});


Route::get('/posts', [PostController::class, 'list_post']);


Route::get('/admin/tasks', [TaskController::class,'index'])->name('tasks.index');
Route::get('/admin/add_task', [TaskController::class,'create'])->name('tasks.create');
Route::post('/admin/save_task', [TaskController::class,'store'])->name('tasks.store');
Route::get('/admin/edit_tasks/{task}', [TaskController::class,'edit'])->name('tasks.edit');
Route::put('/admin/update_tasks/{task}', [TaskController::class,'update'])->name('tasks.update');
Route::delete('/admin/delete_tasks/{task}', [TaskController::class,'destroy'])->name('tasks.destroy');


//Route::resource('users', UserController::class);
Route::get('/user', [UserController::class,'index'])->name('user.index');
Route::get('/user/add_user', [UserController::class,'create'])->name('user.create');
Route::post('/user/save_user', [UserController::class,'store'])->name('user.store');
Route::get('/user/edit_user/{user}/', [UserController::class,'edit'])->name('user.edit');
Route::put('/user/update_user/{user}', [UserController::class,'update'])->name('user.update');
Route::delete('/user/delete_user/{user}', [UserController::class,'destroy'])->name('user.destroy');
