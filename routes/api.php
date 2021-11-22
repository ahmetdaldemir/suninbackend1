<?php

use App\Enums\BusinessType;
use App\Enums\PoolType;
use App\Enums\VillaType;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\DestinationController;
use App\Http\Controllers\Admin\VillaController;
use App\Http\Controllers\Admin\TenantController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\RegulationController;

use App\Http\Controllers\Auth\ApiAuthController;
use App\Http\Controllers\Landlord\MyCalenderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:api')->group(function () {
    Route::post('/logout', 'Auth\ApiAuthController@logout')->name('logout.api');


});
Route::post('login', [ApiAuthController::class, 'login']);
Route::get('getkey/{key}', [ApiAuthController::class, 'key']);

Route::group(['middleware' => ['tokenisvalid']], function () {
    Route::post('register', [ApiAuthController::class, 'register']);
    Route::post('user', [ApiAuthController::class, 'user']);
    Route::get('/flags', [LanguageController::class, 'flags']);
    Route::get('/languages', [LanguageController::class, 'index']);
    Route::post('/languages', [LanguageController::class, 'create']);
    Route::post('/languages/edit', [LanguageController::class, 'edit']);
    Route::get('/languages/delete/{id}', [LanguageController::class, 'destroy']);
    Route::get('/languages/setdefault/{id}', [LanguageController::class, 'setDefault']);

    Route::post('/property', [PropertyController::class, 'store']);
    Route::get('/property', [PropertyController::class, 'index']);
    Route::post('/property/update', [PropertyController::class, 'update']);
    Route::get('/property/{id}', [PropertyController::class, 'show']);
    Route::delete('/property/{id}', [PropertyController::class, 'destroy']);

    Route::post('/category', [CategoryController::class, 'store']);
    Route::get('/category', [CategoryController::class, 'index']);
    Route::post('/category/update', [CategoryController::class, 'update']);
    Route::get('/category/{id}', [CategoryController::class, 'show']);
    Route::delete('/category/{id}', [CategoryController::class, 'destroy']);

    Route::post('/destination', [DestinationController::class, 'store']);
    Route::get('/destination', [DestinationController::class, 'index']);
    Route::post('/destination/update', [DestinationController::class, 'update']);
    Route::get('/destination/{id}', [DestinationController::class, 'show']);
    Route::delete('/destination/{id}', [DestinationController::class, 'destroy']);

    Route::post('/villa', [VillaController::class, 'store']);
    Route::get('/villa', [VillaController::class, 'index']);
    Route::post('/villa/update', [VillaController::class, 'update']);
    Route::get('/villa/{id}', [VillaController::class, 'show']);
    Route::delete('/villa/{id}', [VillaController::class, 'destroy']);
    Route::get('/ical', [VillaController::class, 'ical']);


    Route::post('/tenants', [TenantController::class, 'store']);
    Route::get('/tenants', [TenantController::class, 'index']);
    Route::post('/tenants/update', [TenantController::class, 'update']);
    Route::get('/tenants/{id}', [TenantController::class, 'show']);
    Route::delete('/tenants/{id}', [TenantController::class, 'destroy']);

    Route::post('/service', [ServiceController::class, 'store']);
    Route::get('/service', [ServiceController::class, 'index']);
    Route::post('/service/update', [ServiceController::class, 'update']);
    Route::get('/service/{id}', [ServiceController::class, 'show']);
    Route::delete('/service/{id}', [ServiceController::class, 'destroy']);


    Route::post('/regulation', [RegulationController::class, 'store']);
    Route::get('/regulation', [RegulationController::class, 'index']);
    Route::post('/regulation/update', [RegulationController::class, 'update']);
    Route::get('/regulation/{id}', [RegulationController::class, 'show']);
    Route::delete('/regulation/{id}', [RegulationController::class, 'destroy']);
});


Route::group(['prefix'=>'landlord','as'=>'landlord.','middleware' => ['tokenisvalid']], function(){
    Route::resource('mycalender', MyCalenderController::class);
//    Route::resource('villa', VillaController::class);
//    Route::resource('property', PropertyController::class);

    Route::get('/pooltype', function()
    {
        return PoolType::map();
    });
    Route::get('/villatype', function()
    {
        return VillaType::map();
    });
    Route::get('/tenanttype', function()
    {
        return BusinessType::map();
    });
});
