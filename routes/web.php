<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\MenusController;
use App\Http\Controllers\MenusAccessController;
use App\Http\Controllers\UsersController;

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
    return redirect()->route('sign-in');
})->name('/');

Route::middleware('sessionRedirect')->group( function () {
    Route::prefix('auth')->group( function () {
        Route::get('/sign-in', [AuthController::class, 'signin'])->name('sign-in');
        Route::get('/sign-up', [AuthController::class, 'signup'])->name('sign-up');

        Route::post('/sign-in-post', [AuthController::class, 'signinPost'])->name('sign-in-post');
        Route::post('/sign-up-post', [AuthController::class, 'signupPost'])->name('sign-up-post');
    });
});

// Route not middleware
Route::get('/verified-mail', [AuthController::class, 'verifiedEmail'])->name('verified-email');
Route::get('/sign-out', [AuthController::class, 'signout'])->name('sign-out');

// Route Send Mail
Route::post('/send-mail-verification', [AuthController::class, 'sendMailVerified'])->name('send-verified-email');

Route::middleware('sessionAuth')->group( function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
    });
    
    // Users Management
    Route::prefix('users-management')->group( function(){
    
        // Roles
        Route::get('/roles', [RolesController::class, 'index'])->name('roles');
        Route::get('/roles-access/{id}', [RolesController::class, 'access'])->name('roles-access');
        Route::get('/roles-access/post/{id}', [RolesController::class, 'accessPost'])->name('roles-access-post');
    
        // Menus
        Route::get('/menus', [MenusController::class, 'index'])->name('menus');
    
        // Menu Access
        Route::get('/menus-access', [MenusAccessController::class, 'index'])->name('menus-access');
    
        // Users
        Route::get('/users', [UsersController::class, 'index'])->name('users');
    
    });
});