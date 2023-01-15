<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\MenusController;
use App\Http\Controllers\MenusAccessController;
use App\Http\Controllers\UsersController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Roles
Route::prefix('roles')->group( function(){
    Route::get('/', [RolesController::class, 'retrive']);
    Route::get('/{id}', [RolesController::class, 'retriveById']);
    Route::post('/create', [RolesController::class, 'create']);
    Route::post('/update/{id}', [RolesController::class, 'update']);
    Route::delete('/delete/{id}', [RolesController::class, 'delete']);
});

// Menus
Route::prefix('menus')->group( function(){
    Route::get('/', [MenusController::class, 'retrive']);
    Route::get('/{id}', [MenusController::class, 'retriveById']);
    Route::post('/create', [MenusController::class, 'create']);
    Route::post('/update/{id}', [MenusController::class, 'update']);
    Route::delete('/delete/{id}', [MenusController::class, 'delete']);
});

// Menus
Route::prefix('menu-access')->group( function(){
    Route::get('/', [MenusAccessController::class, 'retrive']);
    Route::get('/{id}', [MenusAccessController::class, 'retriveById']);
    Route::get('/by-role/{role_id}', [MenusAccessController::class, 'retriveByRole']);
    Route::post('/create', [MenusAccessController::class, 'create']);
    Route::post('/update/{id}', [MenusAccessController::class, 'update']);
    Route::delete('/delete/{id}', [MenusAccessController::class, 'delete']);
});

// Access
Route::prefix('access')->group( function(){
    Route::get('/menus/{id}', [RolesController::class, 'rolesAccess']);
});

// Users
Route::prefix('users')->group( function(){
    Route::get('/', [UsersController::class, 'retrive']);
    Route::get('/{id}', [UsersController::class, 'retriveById']);
    Route::post('/create', [UsersController::class, 'create']);
    Route::post('/update/{id}', [UsersController::class, 'update']);
    Route::delete('/delete/{id}', [UsersController::class, 'delete']);
});
