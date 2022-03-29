<?php

use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\UsersController;
use App\Models\Permission;
use App\Models\Role;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(["middleware" => ['auth:sanctum', 'verified']], function () {

    // set default route for dashboard by role
    // Route::get('/redirecting...', [DashboardController::class, "getDefaultIndex"]);

    /** ROLE SUPER ADMIN */
    Route::group(["middleware" => ['role:'.Role::ROLE_ADMIN]], function(){
        /** Route Dashboard */
        // Route::get('/dashboard-s-admin', [DashboardController::class, "index"])->name('dashboard.users.superadmin');

        /** Route Users */
        Route::group(["middleware" => ['permission:'. Permission::MANAGE_USERS]], function(){
            Route::get('/users', [UsersController::class, "index"])->name('users');
            Route::get('/user/new', [UsersController::class, "create"])->name('user.new');
            Route::get('/user/{id}/show', [UsersController::class, "show"])->name('user.show');
            Route::get('/user/{id}/edit', [UsersController::class, "edit"])->name('user.edit');
        });

        /** Route Role Permission */
        Route::group(["middleware" => ['permission:'. Permission::MANAGE_ROLES . '|' . Permission::MANAGE_PERMISSIONS ]], function(){
            Route::get('/role-&-permission', [RolePermissionController::class, "index"])->name('role-permission');
            Route::get('/role/{id}/edit', [RolePermissionController::class, "editRole"])->name('role.edit');
            Route::get('/permission/{id}/edit', [RolePermissionController::class, "editPermission"])->name('permission.edit');
        });
    });
});

