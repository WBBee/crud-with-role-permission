<?php

use App\Http\Controllers\RolePermissionController;
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
        // Route::view('', 'dashboard')->name('dashboard.users.superadmin');
        // Route::get('/dashboard-s-admin', [DashboardController::class, "index"])->name('dashboard.users.superadmin');

        /** Route Role Permission */
        Route::get('/role-&-permission', [RolePermissionController::class, "index"])->name('role-permission');
        Route::get('/role/{id}/edit', [RolePermissionController::class, "editRole"])->name('role.edit');
        // Route::get('/role/{id}/view', [RolePermissionController::class, "show"])->name('role.view');
        Route::get('/permission/{id}/edit', [RolePermissionController::class, "editPermission"])->name('permission.edit');
    });
});

