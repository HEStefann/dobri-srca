<?php

use App\Http\Controllers\CardIdController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SubscriptionsController;
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

require __DIR__.'/auth.php';

// route for dashboardnew.blade.php
Route::get('/dashboardnew' , function () {
    return view('dashboardnew');
});

// View all users
Route::get('/users', [UserController::class, 'index'])->name('users.index');

// Edit user information
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

// View all Card
Route::get('/cardid', [CardIdController::class, 'index'])->name('cardid.index');
// Edit cardid information
Route::get('/cardid/{cardid}/edit', [CardIdController::class, 'edit'])->name('card_ids.edit');
Route::put('/cardid/{cardid}', [CardIdController::class, 'update'])->name('card_ids.update');
Route::delete('/cardid/{cardid}', [CardIdController::class, 'destroy'])->name('card_ids.destroy');

// View all Card
Route::get('/subscriptions', [SubscriptionsController::class, 'index'])->name('cardid.index');
// Edit cardid information
Route::get('/subscriptions/{subscriptions}/edit', [SubscriptionsController::class, 'edit'])->name('subscriptions.edit');
Route::put('/subscriptions/{subscriptions}', [SubscriptionsController::class, 'update'])->name('subscriptions.update');
Route::delete('/subscriptions/{subscriptions}', [SubscriptionsController::class, 'destroy'])->name('subscriptions.destroy');

// // Manage user roles (assuming roles are managed in a separate controller)
// Route::get('/users/{user}/manage-roles', [UserRoleController::class, 'edit'])->name('users.manageRoles');
// Route::put('/users/{user}/manage-roles', [UserRoleController::class, 'update'])->name('users.updateRoles');