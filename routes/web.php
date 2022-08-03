<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\AboutController;


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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');
Route::post('/reservation', [App\Http\Controllers\ReservationController::class, 'reserve'])->name('reservation.reserve');
Route::post('/contactus', [App\Http\Controllers\ContactController::class,'contact'])->name('contactus.contact');

Auth::routes();

Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function(){
    Route::get('dashboard',[App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
       Route::resource('slider',SliderController::class);
       Route::resource('category',CategoryController::class);
       Route::resource('item',ItemController::class);
       Route::resource('about',AboutController::class);
    Route::get('reservation',[App\Http\Controllers\Admin\ReservationController::class,'index'])->name('reservation.index');
    Route::post('/reservation/status/{id}',[App\Http\Controllers\Admin\ReservationController::class,'status'])->name('reservation.status');
    Route::get('/reservation/view/{id}',[App\Http\Controllers\Admin\ReservationController::class,'view'])->name('reservation.view');
    Route::delete('/reservation/delete/{id}',[App\Http\Controllers\Admin\ReservationController::class,'destroy'])->name('reservation.destroy');
    //Contact part
    Route::get('contact', [App\Http\Controllers\Admin\ContactController::class, 'index'
    ])->name('contact.index');
    Route::post('/contact/status/{id}', [App\Http\Controllers\Admin\ContactController::class,'status'])->name('contact.status');
    Route::get('/contact/view/{id}',[App\Http\Controllers\Admin\ContactController::class,'view'])->name('contact.view');
   Route::delete('/contact/delete/{id}',[App\Http\Controllers\Admin\ContactController::class,'destroy'])->name('contact.destroy');

});



