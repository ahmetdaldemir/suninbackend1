<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\Rent\VillaController;
use Illuminate\Support\Facades\Route;

Route::get('/clear-cache', function() {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "Cache is cleared";
})->name('clear.cache');


Route::domain('rent.suninturkey.xyz')->group(function () {

    /**Villalar**/
    Route::get('/', 'App\Http\Controllers\Rent\DashboardController@index');
    Route::get('logout', 'App\Http\Controllers\Auth\ApiAuthController@logout');
    Route::get('villa', 'App\Http\Controllers\Rent\VillaController@index')->name('villa');
    Route::get('villa/create', 'App\Http\Controllers\Rent\VillaController@create')->name('villa/create');
    Route::post('villa/store', 'App\Http\Controllers\Rent\VillaController@store')->name('villa/store');
    Route::get('villa/edit/{id}', 'App\Http\Controllers\Rent\VillaController@edit')->name('villa/edit');
    Route::post('villa/update', 'App\Http\Controllers\Rent\VillaController@update')->name('villa/update');

    /**Bloglar**/
    Route::get('blog', 'App\Http\Controllers\Rent\BlogController@index')->name('blog');
    Route::get('blog/{id}', 'App\Http\Controllers\Rent\BlogController@index')->name('blogUpdate');
    Route::get('blog/create', 'App\Http\Controllers\Rent\BlogController@create')->name('blog/create');
    Route::post('blog/store', 'App\Http\Controllers\Rent\BlogController@store')->name('blog/store');
    Route::get('blog/delete/{id}', 'App\Http\Controllers\Rent\BlogController@destroy')->name('blog/delete');
    Route::post('blog/update', 'App\Http\Controllers\Rent\BlogController@update')->name('blog/update');
    Route::get('settings', 'App\Http\Controllers\Rent\SettingsController@index')->name('settings');
    Route::post('settings/update', 'App\Http\Controllers\Rent\SettingsController@update')->name('settings/update');
    /**Kullanıcılar**/
    Route::get('users', 'App\Http\Controllers\Rent\UserController@index')->name('user');
    Route::get('users/{id}', 'App\Http\Controllers\Rent\UserController@index')->name('userUpdate');
    Route::post('users/store', 'App\Http\Controllers\Rent\UserController@store')->name('user/store');
    Route::post('users/update', 'App\Http\Controllers\Rent\UserController@update')->name('user/update');
    /**Şubeler**/
    Route::get('branches', 'App\Http\Controllers\Rent\BranchesController@index')->name('branches');
    Route::get('branches/{id}', 'App\Http\Controllers\Rent\BranchesController@index')->name('branchesUpdate');
    Route::post('branches/store', 'App\Http\Controllers\Rent\BranchesController@store')->name('branches/store');
    Route::post('branches/update', 'App\Http\Controllers\Rent\BranchesController@update')->name('branches/update');
    /**Acentalar**/
    Route::get('agents', 'App\Http\Controllers\Rent\AgentsController@index')->name('user');
    Route::get('agents/{id}', 'App\Http\Controllers\Rent\AgentsController@index')->name('agentsUpdate');
    Route::post('agents/store', 'App\Http\Controllers\Rent\AgentsController@store')->name('agents/store');
    Route::post('agents/update', 'App\Http\Controllers\Rent\AgentsController@update')->name('agents/update');
    /**Roller**/ 
    Route::get('rols', 'App\Http\Controllers\Rent\RolsController@index')->name('rols');
    Route::get('rols/{id}', 'App\Http\Controllers\Rent\RolsController@index')->name('rolsUpdate');
    Route::post('rols/store', 'App\Http\Controllers\Rent\RolsController@store')->name('rols/store');
    Route::post('rols/update', 'App\Http\Controllers\Rent\RolsController@update')->name('rols/update');
    /**Mesajlar**/
    Route::get('messages', 'App\Http\Controllers\Rent\MessagesController@index')->name('messages');
    Route::get('messages/{id}', 'App\Http\Controllers\Rent\MessagesController@index')->name('messagesuserUpdate');
    Route::post('messages/store', 'App\Http\Controllers\Rent\MessagesController@store')->name('messages/store');
    Route::post('messages/update', 'App\Http\Controllers\Rent\MessagesController@update')->name('messages/update');
    /**Kontratlar**/
    Route::get('contracts', 'App\Http\Controllers\Rent\ContractsController@index')->name('contracts');
    Route::get('contracts/{id}', 'App\Http\Controllers\Rent\ContractsController@index')->name('contractsUpdate');
    Route::post('contracts/store', 'App\Http\Controllers\Rent\ContractsController@store')->name('contracts/store');
    Route::post('contracts/update', 'App\Http\Controllers\Rent\ContractsController@update')->name('contracts/update');


    Route::get('/ical', 'App\Http\Controllers\Rent\VillaController@ical')->name('ical');


    Route::get('reservation/create', 'App\Http\Controllers\Rent\VillaController@index')->name('reservation/create');
    Route::get('reservation', 'App\Http\Controllers\Rent\VillaController@index')->name('reservation');
    Route::get('requests', 'App\Http\Controllers\Rent\VillaController@index')->name('requests');
});
/////------------------------------------------------------------------------------------------------------////
Route::domain('suninturkey.xyz')->group(function () {


//Route::get('/', function(){
//    return redirect()->route('layout-light');
//})->name('/');

Route::view('layout-light', 'starterkit.layout-light')->name('layout-light');
Route::view('layout-dark', 'starterkit.layout-dark')->name('layout-dark');
Route::view('sidebar-fixed', 'starterkit.sidebar-fixed')->name('sidebar-fixed');
Route::view('boxed', 'starterkit.boxed')->name('boxed');
Route::view('layout-rtl', 'starterkit.layout-rtl')->name('layout-rtl');
Route::view('vertical', 'starterkit.vertical')->name('vertical');
Route::view('mega-menu', 'starterkit.mega-menu')->name('mega-menu');


Route::prefix('dashboard')->group(function () {
	Route::view('default', 'dashboard.index')->name('default');
	Route::view('crypto', 'dashboard.crypto')->name('crypto');
	Route::view('ecommerce', 'dashboard.ecommerce')->name('ecommerce');
});


Route::get('/app',function(){
    return view('login');
});


Route::get('/', [MainController::class, 'index']);
Route::get('/contact', [MainController::class, 'contact']);
Route::get('/blog', [MainController::class, 'blog']);
Route::get('/about', [MainController::class, 'about']);
Route::get('detail', [MainController::class, 'detail'])->name('detail');
Route::get('listing', [MainController::class, 'listing'])->name('listing');
Route::get('add_listing', [MainController::class, 'add_listing'])->name('add_listing');

});
