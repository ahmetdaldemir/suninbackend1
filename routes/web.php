<?php

use App\Http\Controllers\MainController;
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
    Route::get('/', function() {
        return view('rent/dashboard/index');
    });
});

Route::domain('suninturkey.xyz')->group(function () {

 Route::get('/', function () {
     return view('welcome');
 });

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

Route::get('/contact', [MainController::class, 'contact']);
Route::get('/blog', [MainController::class, 'blog']);
Route::get('/about', [MainController::class, 'about']);
Route::get('detail', [MainController::class, 'detail'])->name('detail');
Route::get('listing', [MainController::class, 'listing'])->name('listing');
Route::get('add_listing', [MainController::class, 'add_listing'])->name('add_listing');
});
