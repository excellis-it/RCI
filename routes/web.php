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
use App\Http\Controllers\Frontend\PmLevelController;
use App\Http\Controllers\Frontend\PmIndexController;
use App\Http\Controllers\Frontend\DesigController;
use App\Http\Controllers\Frontend\DivisionController;
use App\Http\Controllers\Frontend\GroupController;
use App\Http\Controllers\Frontend\CadreController;
use App\Http\Controllers\Frontend\FundTypeController;
use App\Http\Controllers\Frontend\QuaterController;
use App\Http\Controllers\Frontend\ExServiceController;
use App\Http\Controllers\Frontend\PgController;
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
        'pm-levels' => PmLevelController::class,
        'pm-index' => PmIndexController::class,
        'divisions' => DivisionController::class,
        'groups' => GroupController::class,
        'cadres' => CadreController::class,
        'fund-types' => FundTypeController::class,
        'quarters' => QuaterController::class, 
        'ex-services' => ExServiceController::class,
        'pgs' => PgController::class,
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

    // PM Level
    Route::prefix('pm-levels')->group(function () {
        Route::get('/pm-levels-delete/{id}', [PmLevelController::class, 'delete'])->name('pm-levels.delete');
    });
    Route::get('/pm-levels-fetch-data', [PmLevelController::class, 'fetchData'])->name('pm-levels.fetch-data');

    //PM Index
    Route::prefix('pm-index')->group(function () {
        Route::get('/pm-index-delete/{id}', [PmIndexController::class, 'delete'])->name('pm-index.delete');
    });
    Route::get('/pm-index-fetch-data', [PmIndexController::class, 'fetchData'])->name('pm-index.fetch-data');


    //division
    Route::prefix('divisions')->group(function () {
        Route::get('/divisions-delete/{id}', [DivisionController::class, 'delete'])->name('divisions.delete');
    });
    Route::get('/divisions-fetch-data', [DivisionController::class, 'fetchData'])->name('divisions.fetch-data');

    //group
    Route::prefix('groups')->group(function () {
        Route::get('/groups-delete/{id}', [GroupController::class, 'delete'])->name('groups.delete');
    });
    Route::get('/groups-fetch-data', [GroupController::class, 'fetchData'])->name('groups.fetch-data');

    //cadres
    Route::prefix('cadres')->group(function () {
        Route::get('/cadres-delete/{id}', [CadreController::class, 'delete'])->name('cadres.delete');
    });
    Route::get('/cadres-fetch-data', [CadreController::class, 'fetchData'])->name('cadres.fetch-data');

    //fund types
    Route::prefix('fund-types')->group(function () {
        Route::get('/fund-types-delete/{id}', [FundTypeController::class, 'delete'])->name('fund-types.delete');
    });
    Route::get('/fund-types-fetch-data', [FundTypeController::class, 'fetchData'])->name('fund-types.fetch-data');

    //quarters
    Route::prefix('quarters')->group(function () {
        Route::get('/quarters-delete/{id}', [QuaterController::class, 'delete'])->name('quarters.delete');
    });
    Route::get('/quarters-fetch-data', [QuaterController::class, 'fetchData'])->name('quarters.fetch-data');


    //ex-service
    Route::prefix('ex-services')->group(function () {
        Route::get('/ex-services-delete/{id}', [ExServiceController::class, 'delete'])->name('ex-services.delete');
    });
    Route::get('/ex-services-fetch-data', [ExServiceController::class, 'fetchData'])->name('ex-services.fetch-data');

    //pg 
    Route::prefix('pgs')->group(function () {
        Route::get('/pgs-delete/{id}', [PgController::class, 'delete'])->name('pgs.delete');
    });
    Route::get('/pgs-fetch-data', [PgController::class, 'fetchData'])->name('pgs.fetch-data');

    Route::get('/edit-member',[MemberController::class,'editMember'])->name('edit.member');
   
});
