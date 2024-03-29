<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// User
Route::get('/signup', [\App\Http\Controllers\User\UserController::class, 'showSignup'])
->name('user.showSignup');

Route::post('user/create', \App\Http\Controllers\User\CreateController::class)
->name('user.create');

Route::middleware('auth')->group(function (){

    Route::get('/top', [\App\Http\Controllers\User\UserController::class,'top'])
    ->name('user.top');

});

Route::get('/login', [\App\Http\Controllers\User\UserController::class,'showLogin'])
->name('user.showLogin');

Route::post('/login', \App\Http\Controllers\User\LoginController::class)
->name('user.login');

Route::post('logout', [\App\Http\Controllers\User\UserController::class,'logout'])
->name('user.logout');

Route::get('user/showEdit', [\App\Http\Controllers\User\UserController::class, 'showEdit'])
->name('user.showEdit');

Route::post('user/edit', \App\Http\Controllers\User\EditController::class)
->name('user.edit');

Route::get('data/index', \App\Http\Controllers\Data\IndexController::class)
->name('data.index');

Route::get('data/add/index', \App\Http\Controllers\Data\Add\IndexController::class)
->name('data.showAdd');

Route::post('data/create', \App\Http\Controllers\Data\Add\CreateController::class)
->name('data.create');

Route::put('data/update', \App\Http\Controllers\Data\Update\PutController::class)
->name('data.update');

Route::delete('data/delete', \App\Http\Controllers\Data\Delete\DeleteController::class)
->name('data.delete');

require __DIR__.'/auth.php';