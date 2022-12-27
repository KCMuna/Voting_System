<?php

use PhpParser\Node\Stmt\Function_;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::post('poll/store', [UserController::class, 'vote_store'])->middleware(['auth'])->name('vote_store');
Route::get('poll',[UserController::class,'show_poll'])->middleware(['auth'])->name('poll');
// Route::get('showoption',[UserController::class,'show_option'])->middleware(['auth'])->name('showoption');
Route::get('showpoll/{id}',[UserController::class,'spoll'])->middleware(['auth'])->name('showpoll');
Route::get('my-profile',[UserController::class,'profile'])->middleware(['auth'])->name('profile');
Route::post('my-profile-update',[UserController::class,'updateprofile'])->middleware(['auth'])->name('updateprofile');

require __DIR__.'/auth.php';

// Admin
Route::namespace ('Admin')->prefix('admin')->name('admin.')->group(function () {
    Route::namespace ('Auth')->middleware('guest:admin')->group(function () {
        //login route
        Route::get('login',[AuthenticatedSessionController::class,'index'])->name('login');
        Route::post('login',[AuthenticatedSessionController::class,'store'])->name('adminlogin');
    });
        Route::middleware('admin')->group(function() {
            Route::get('dashboard',[HomeController::class,'show_dashboard'])->name('dashboard');

            //admin poll section
            Route::get('poll',[HomeController::class,'show'])->name('poll');
            Route::get('form', function () { 
                return view('admin/form');});
            Route::post('form',[HomeController::class,'store'])->name('store');
            Route::get('/edit/{id?}',[HomeController::class,'edit'])->name('edit');
            Route::get('/delete/{id?}',[HomeController::class,'delete'])->name('delete');
            Route::any('/edit-action',[HomeController::class,'update'])->name('edit-action');
            // option section
            Route::get('option',[HomeController::class,'show_option'])->name('option');
            Route::get('option_form', function () { 
                return view('admin/option_form');});
            Route::post('option-form',[HomeController::class,'option_store'])->name('option_store');
            Route::get('/option-edit/{id?}',[HomeController::class,'option_edit'])->name('option_edit');
            Route::get('/option-delete/{id?}',[HomeController::class,'option_delete'])->name('option_delete');
            Route::any('/option-edit-action',[HomeController::class,'option_update'])->name('option-edit-action');
                //submitted_votes sectin
            Route::get('submitted',[HomeController::class,'show_submitted'])->name('submitted');
            Route::get('/chart/view-stats/{Poll}',[HomeController::class, 'viewStats'])->name('show_stats');
        });
    Route::post('logout',[AuthenticatedSessionController::class,'destroy'])->name('logout');
 
});