<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\Rent\VillaController;
use Illuminate\Support\Facades\Route;

Route::get('/clear-cache', function () {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "Cache is cleared";
})->name('clear.cache');

//Route::get('/imageslink', function () { Artisan::call('storage:link');});

Route::domain('rent.suninturkey.xyz')->group(function () {

    /**Villalar**/
    Route::get('/', 'App\Http\Controllers\Rent\DashboardController@index');
    Route::get('logout', 'App\Http\Controllers\Auth\ApiAuthController@logout');
    Route::get('villa', 'App\Http\Controllers\Rent\VillaController@index')->name('villa');
    Route::get('villa/create', 'App\Http\Controllers\Rent\VillaController@create')->name('villa/create');
    Route::post('villa/store', 'App\Http\Controllers\Rent\VillaController@store')->name('villa/store');
    Route::get('villa/edit/{id}', 'App\Http\Controllers\Rent\VillaController@edit')->name('villa/edit');
    Route::post('villa/update', 'App\Http\Controllers\Rent\VillaController@update')->name('villa/update');
    Route::get('villa/parent/{parent}', 'App\Http\Controllers\Rent\VillaController@parent')->name('villa/parent');
    Route::get('villa/images/{id}', 'App\Http\Controllers\Rent\VillaController@images')->name('villa/images');
    Route::post('villa/images/sortSave', 'App\Http\Controllers\Rent\VillaController@sortSave')->name('villa/sortSave');
    Route::post('villa/images/mainImage', 'App\Http\Controllers\Rent\VillaController@mainImage')->name('villa/mainImage');
    Route::post('villa/images/save', 'App\Http\Controllers\Rent\VillaController@imageSave')->name('villa/images/save');
    Route::post('villa/images/delete', 'App\Http\Controllers\Rent\VillaController@imagedestroy')->name('villa/images/delete');
    Route::get('villa/comment/{id}', 'App\Http\Controllers\Rent\VillaController@comment')->name('villa/comment');
    Route::post('villa/comment/status', 'App\Http\Controllers\Rent\VillaController@status')->name('villa/status');
    Route::post('villa/comment/delete', 'App\Http\Controllers\Rent\VillaController@imagedestroy')->name('villa/comment/delete');
    Route::get('villa/contracts/{id}', 'App\Http\Controllers\Rent\ContractController@index')->name('villa/contracts');
    Route::post('villa/contracts/create', 'App\Http\Controllers\Rent\ContractController@create')->name('villa/contracts/create');
    Route::post('villa/contracts/update', 'App\Http\Controllers\Rent\ContractController@update')->name('villa/contracts/update');
    Route::post('villa/contracts/show', 'App\Http\Controllers\Rent\ContractController@show')->name('villa/contracts/show');
    Route::post('villa/contracts/copy', 'App\Http\Controllers\Rent\ContractController@copy')->name('villa/contracts/copy');
    Route::post('villa/contracts/save', 'App\Http\Controllers\Rent\ContractController@save')->name('villa/contracts/save');
    Route::post('villa/contracts/delete', 'App\Http\Controllers\Rent\ContractController@destroy')->name('villa/contracts/delete');

    /**Bloglar**/
    Route::get('blog', 'App\Http\Controllers\Rent\BlogController@index')->name('blog');
    Route::get('blog/{id}', 'App\Http\Controllers\Rent\BlogController@index')->name('blogUpdate');
    Route::get('blog/create', 'App\Http\Controllers\Rent\BlogController@create')->name('blog/create');
    Route::post('blog/store', 'App\Http\Controllers\Rent\BlogController@store')->name('blog/store');
    Route::get('blog/delete/{id}', 'App\Http\Controllers\Rent\BlogController@destroy')->name('blog/delete');
    Route::post('blog/update', 'App\Http\Controllers\Rent\BlogController@update')->name('blog/update');
    /**Slider**/
    Route::get('slider', 'App\Http\Controllers\Rent\SliderController@index')->name('slider');
    Route::get('slider/{id}', 'App\Http\Controllers\Rent\SliderController@index')->name('sliderUpdate');
    Route::get('slider/create', 'App\Http\Controllers\Rent\SliderController@create')->name('slider/create');
    Route::post('slider/store', 'App\Http\Controllers\Rent\SliderController@store')->name('slider/store');
    Route::get('slider/delete/{id}', 'App\Http\Controllers\Rent\SliderController@destroy')->name('slider/delete');
    Route::post('slider/update', 'App\Http\Controllers\Rent\SliderController@update')->name('slider/update');
    /**Kurlar**/
    Route::get('currency', 'App\Http\Controllers\Rent\CurrencyController@index')->name('currency');
    Route::get('currency/{id}', 'App\Http\Controllers\Rent\CurrencyController@index')->name('currencyUpdate');
    Route::get('currency/create', 'App\Http\Controllers\Rent\CurrencyController@create')->name('currency/create');
    Route::post('currency/store', 'App\Http\Controllers\Rent\CurrencyController@store')->name('currency/store');
    Route::get('currency/delete/{id}', 'App\Http\Controllers\Rent\CurrencyController@destroy')->name('currency/delete');
    Route::post('currency/update', 'App\Http\Controllers\Rent\CurrencyController@update')->name('currency/update');
    /**Bloglar**/
    Route::get('settings', 'App\Http\Controllers\Rent\SettingsController@index')->name('settings');
    Route::post('settings/update', 'App\Http\Controllers\Rent\SettingsController@update')->name('settings/update');
    /**Kullanıcılar**/
    Route::get('users', 'App\Http\Controllers\Rent\UserController@index')->name('users');
    Route::get('users/{id}', 'App\Http\Controllers\Rent\UserController@index')->name('userUpdate');
    Route::post('users/store', 'App\Http\Controllers\Rent\UserController@store')->name('users/store');
    Route::post('users/update', 'App\Http\Controllers\Rent\UserController@update')->name('users/update');
    Route::get('users/roles/{id}', 'App\Http\Controllers\Rent\UserController@roles')->name('users/roles');
    Route::post('users/rolesadd', 'App\Http\Controllers\Rent\UserController@rolesadd')->name('users/rolesadd');
    /**CRM**/
    Route::get('crm/module', 'App\Http\Controllers\Rent\ModuleController@index')->name('module');
    Route::get('crm/module/edit/{id}', 'App\Http\Controllers\Rent\ModuleController@edit')->name('crm/module/edit');
    Route::get('crm/module/store/{id}', 'App\Http\Controllers\Rent\ModuleController@store')->name('crm/module/store');
    Route::post('crm/module/update', 'App\Http\Controllers\Rent\ModuleController@update')->name('crm/module/update');
    Route::get('crm/module/delete/{id}', 'App\Http\Controllers\Rent\ModuleController@destroy')->name('crm/module/delete');

    Route::get('crm/page', 'App\Http\Controllers\Rent\RentPageController@index')->name('page');
    Route::get('crm/page/edit/{id}', 'App\Http\Controllers\Rent\RentPageController@edit')->name('crm/page/edit');
    Route::get('crm/page/store/{id}', 'App\Http\Controllers\Rent\RentPageController@store')->name('crm/page/store');
    Route::post('crm/page/update', 'App\Http\Controllers\Rent\RentPageController@update')->name('crm/page/update');
    Route::get('crm/page/delete/{id}', 'App\Http\Controllers\Rent\RentPageController@destroy')->name('crm/page/delete');

    Route::get('crm/destination', 'App\Http\Controllers\Rent\RentDestinationController@index')->name('crm/destination');
    Route::get('crm/destination/edit/{id}', 'App\Http\Controllers\Rent\RentDestinationController@edit')->name('crm/destination/edit');
    Route::get('crm/destination/store/{id}', 'App\Http\Controllers\Rent\RentDestinationController@store')->name('crm/destination/store');
    Route::post('crm/destination/update', 'App\Http\Controllers\Rent\RentDestinationController@update')->name('crm/destination/update');
    Route::get('crm/destination/delete/{id}', 'App\Http\Controllers\Rent\RentDestinationController@destroy')->name('crm/destination/delete');

    Route::get('crm/category', 'App\Http\Controllers\Rent\RentCategoryController@index')->name('crm/category');
    Route::get('crm/category/edit/{id}', 'App\Http\Controllers\Rent\RentCategoryController@edit')->name('crm/category/edit');
    Route::get('crm/category/store/{id}', 'App\Http\Controllers\Rent\RentCategoryController@store')->name('crm/category/store');
    Route::post('crm/category/update', 'App\Http\Controllers\Rent\RentCategoryController@update')->name('crm/category/update');
    Route::get('crm/category/delete/{id}', 'App\Http\Controllers\Rent\RentCategoryController@destroy')->name('crm/category/delete');

    Route::get('crm/comment', 'App\Http\Controllers\Rent\CommentController@index')->name('comment');
    Route::get('crm/comment/store/{id}', 'App\Http\Controllers\Rent\CommentController@store')->name('crm/comment/store');
    Route::get('crm/comment/delete/{id}', 'App\Http\Controllers\Rent\CommentController@destroy')->name('crm/comment/delete');
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
    Route::get('permission', 'App\Http\Controllers\Rent\PermissionController@index')->name('permission');
    Route::get('permission/edit/{id}', 'App\Http\Controllers\Rent\PermissionController@edit')->name('edit');
    Route::get('permission/delete/{id}', 'App\Http\Controllers\Rent\PermissionController@delete')->name('delete');
    Route::post('permission/store', 'App\Http\Controllers\Rent\PermissionController@store')->name('permission/store');
    Route::post('permission/update', 'App\Http\Controllers\Rent\PermissionController@update')->name('permission/update');
    /**Mesajlar**/
    Route::get('messages', 'App\Http\Controllers\Rent\MessageController@index')->name('messages');
    Route::get('messages/read/{id}', 'App\Http\Controllers\Rent\MessageController@read')->name('messages/read');
    Route::post('messages/show/{id}', 'App\Http\Controllers\Rent\MessageController@show')->name('messages/show');
    Route::post('messages/store', 'App\Http\Controllers\Rent\MessageController@store')->name('messages/store');
    Route::post('messages/update', 'App\Http\Controllers\Rent\MessageController@update')->name('messages/update');
    /**Müşteriler**/
    Route::get('customers', 'App\Http\Controllers\Rent\CustomerController@index')->name('customers');
    Route::get('customers/create', 'App\Http\Controllers\Rent\CustomerController@create')->name('customers/create');
    Route::get('customers/edit/{id}', 'App\Http\Controllers\Rent\CustomerController@edit')->name('customers/edit');
    Route::post('customers/store', 'App\Http\Controllers\Rent\CustomerController@store')->name('customers/store');
    Route::post('customers/update', 'App\Http\Controllers\Rent\CustomerController@update')->name('customers/update');
    Route::get('customers/delete/{id}', 'App\Http\Controllers\Rent\CustomerController@destroy')->name('customers/delete');
    /**Kontratlar**/
    Route::get('contracts', 'App\Http\Controllers\Rent\ContractsController@index')->name('contracts');
    Route::get('contracts/{id}', 'App\Http\Controllers\Rent\ContractsController@index')->name('contractsUpdate');
    Route::post('contracts/store', 'App\Http\Controllers\Rent\ContractsController@store')->name('contracts/store');
    Route::post('contracts/update', 'App\Http\Controllers\Rent\ContractsController@update')->name('contracts/update');


    Route::get('/ical', 'App\Http\Controllers\Rent\VillaController@ical')->name('ical');


    Route::get('reservation/create', 'App\Http\Controllers\Rent\ReservationController@create')->name('reservation/create');
    Route::post('reservation/store', 'App\Http\Controllers\Rent\ReservationController@store')->name('reservation/store');
    Route::get('reservation/payment/{id}', 'App\Http\Controllers\Rent\ReservationController@payment')->name('reservation/payment');
    Route::get('reservation', 'App\Http\Controllers\Rent\ReservationController@index')->name('reservation');
    Route::get('requests', 'App\Http\Controllers\Rent\ReservationController@index')->name('requests');
    Route::get('reservation/search', 'App\Http\Controllers\Rent\ReservationController@search')->name('reservation/search');
});
/////------------------------------------------------------------------------------------------------------////
Route::domain('suninturkey.xyz')->middleware('checkDomain')->group(function () {


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


    Route::get('/app', function () {
        return view('login');
    });


    Route::get('/', [MainController::class, 'index'])->name('index');
    Route::get('/contact', [MainController::class, 'contact']);
    Route::get('/blog', [MainController::class, 'blog']);
    Route::get('page/{slug}', [MainController::class, 'about']);
    Route::get('villa-detail/{slug}',  [MainController::class, 'detail']);
    Route::get('listing', [MainController::class, 'listing'])->name('listing');
    Route::get('add_listing', [MainController::class, 'add_listing'])->name('add_listing');
    Route::get('destinations', [MainController::class, 'destinations'])->name('destinations');
    Route::get('categories', [MainController::class, 'categories'])->name('categories');
    Route::get('destination-detail/{slug}',  [MainController::class, 'destination_detail']);
    Route::get('category-detail/{slug}',  [MainController::class, 'category_detail']);
    Route::get('categories',  [MainController::class, 'category']);
    Route::get('destination',  [MainController::class, 'destination']);
    Route::get('destination/query',  [MainController::class, 'autoDestination']);
    Route::get('login',  [MainController::class, 'login']);
    Route::post('login/action',  [MainController::class, 'loginaction'])->name('loginaction');
    Route::get('register',  [MainController::class, 'register']);
    Route::post('register/action',  [MainController::class, 'registeraction'])->name('registeraction');
    Route::get('logout',  [MainController::class, 'logout']);
    Route::post('villaCheck',  [MainController::class, 'villaCheck']);
    Route::get('reservation/detail/{villa_id}',  [MainController::class, 'reservationDetail']);
    Route::get('blog-detail/{slug}',  [MainController::class, 'blog_detail']);

});
