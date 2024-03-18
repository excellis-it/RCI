<?php

use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\Frontend\DesignationController;
use App\Http\Controllers\Frontend\DesignationTypeController;
use App\Http\Controllers\Frontend\PaybandController;
use App\Http\Controllers\Frontend\PaybandTypeController;
use App\Http\Controllers\Frontend\PayscaleController;
use App\Http\Controllers\Frontend\PayscaleTypeController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\Frontend\MemberController;
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


Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/login-check', [AuthController::class, 'loginCheck'])->name('login-check');

Route::middleware('permssions')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::post('/profile/update', [ProfileController::class, 'profileUpdate'])->name('profile.update');
    // change password
    Route::prefix('password')->group(function () {
        Route::get('/', [ProfileController::class, 'password'])->name('password'); // password change
        Route::post('/update', [ProfileController::class, 'passwordUpdate'])->name('password.update'); // password update
    });

    Route::resources([
        'categories' => CategoryController::class,
        'payband-types' => PaybandTypeController::class,
        'payscale-types' => PayscaleTypeController::class,
        'payscales' => PayscaleController::class,
        'paybands' => PaybandController::class,
        'designation-types' => DesignationTypeController::class,
        'designations' => DesignationController::class,
        'members' => MemberController::class,
    ]);

    // category
    Route::prefix('categories')->group(function () {
        Route::get('/categories-delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete');
    });
    Route::get('/categories-fetch-data', [CategoryController::class, 'fetchData'])->name('categories.fetch-data');

    // Payband Type
    Route::prefix('payband-types')->group(function () {
        Route::get('/payband-types-delete/{id}', [PaybandTypeController::class, 'delete'])->name('payband-types.delete');
    });
    Route::get('/payband-types-fetch-data', [PaybandTypeController::class, 'fetchData'])->name('payband-types.fetch-data');

    // Payscale Type
    Route::prefix('payscale-types')->group(function () {
        Route::get('/payscale-types-delete/{id}', [PayscaleTypeController::class, 'delete'])->name('payscale-types.delete');
    });
    Route::get('/payscale-types-fetch-data', [PayscaleTypeController::class, 'fetchData'])->name('payscale-types.fetch-data');

    // Payscale
    Route::prefix('payscales')->group(function () {
        Route::get('/payscales-delete/{id}', [PayscaleController::class, 'delete'])->name('payscales.delete');
    });
    Route::get('/payscales-fetch-data', [PayscaleController::class, 'fetchData'])->name('payscales.fetch-data');

    // Payband
    Route::prefix('paybands')->group(function () {
        Route::get('/paybands-delete/{id}', [PaybandController::class, 'delete'])->name('paybands.delete');
    });
    Route::get('/paybands-fetch-data', [PaybandController::class, 'fetchData'])->name('paybands.fetch-data');

    // Designation Type
    Route::prefix('designation-types')->group(function () {
        Route::get('/designation-types-delete/{id}', [DesignationTypeController::class, 'delete'])->name('designation-types.delete');
    });
    Route::get('/designation-types-fetch-data', [DesignationTypeController::class, 'fetchData'])->name('designation-types.fetch-data');

    // Designation
    Route::prefix('designations')->group(function () {
        Route::get('/designations-delete/{id}', [DesignationController::class, 'delete'])->name('designations.delete');
    });
    Route::get('/designations-fetch-data', [DesignationController::class, 'fetchData'])->name('designations.fetch-data');
    Route::get('/get-payscale-type', [DesignationController::class, 'getPayscaleType'])->name('designations.get-payscale-type');
});
