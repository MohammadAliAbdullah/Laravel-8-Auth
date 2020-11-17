<?php

namespace App\Http\Controllers\auth;
namespace App\Http\Controllers;
use App\Models\Menu;

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

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function ()
// })->name('dashboard');
Route::group(
    ['middleware' => 'auth'],
    function () {
        Route::resource('/role', RoleController::class);
        Route::resource('/menu', MenuController::class);
        // MenuPermissionController
        Route::resource('/menu_permission', MenuPermissionController::class);
        Route::resource('/user_role', UserRoleController::class);
        Route::resource('/permission', PermissionController::class);
        Route::post('/user_create', [TestController::class, 'CreateNewUser']);
        Route::get('/user', [TestController::class, 'index']);
        Route::get('/dashboard', [TestController::class, 'dashboard']);
        Route::get('/logout', [TestController::class, 'logout']);
        Route::get('/users_menu', [TestController::class, 'users_menu']);
        Route::get('/settings', [TestController::class, 'settings']);
        // product 
        Route::get('/product', [TestController::class, 'products']);
    }

);
//  relationship ... 
// Route::resource('/rel_user', PhoneController::class);
Route::get('/onetoone', [OneToOneController::class, 'index']);
Route::get('/onetomany', [OneToManyController::class, 'index']);

// 
Route::get('/posts', [PostController::class, 'index']);
Route::get('/many', [PostController::class, 'hasmany']);


