<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
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

Route::get('/', [BlogController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/logout', [AuthenticatedSessionController::class, 'destroy']);
//Route::resource('blog', BlogController::class);
Route::get('/blog/create', [BlogController::class, 'create'])->middleware('can:create-blog');
Route::get('/blog/{id}', [BlogController::class, 'show']);
Route::post('/blog', [BlogController::class, 'store'])->middleware('can:store-blog')->name('blog.store');
Route::get('/blog/{id}/edit', [BlogController::class, 'edit'])->middleware('can:edit-blog');
Route::put('/blog/{id}', [BlogController::class, 'update'])->middleware('can:update-blog');

Route::get('/blog/approve/{id}', [BlogController::class, 'approve'])->middleware('can:approve-blog'); 
Route::delete('/blog/{id}', [BlogController::class, 'destroy'])->middleware('can:destroy-blog');

Route::get('admin', [UserController::class, 'admin'])->name('admin')->middleware('can:admin');
