<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TalentController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\JobController;



Route::get('/clear', function () {
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return redirect()->route('home');
});


Auth::routes();


Route::get('/', function () {
    return view('front.pages.home');
})->name('home');


Route::controller(TalentController::class)->group(function () {
    Route::group(['as' => 'talents.', 'prefix' => 'talents'], function () {
        Route::get('/', 'all')->name('all');
        Route::get('/{slug}', 'index')->name('index');
    });
});


Route::controller(ProjectController::class)->group(function () {
    Route::group(['as' => 'projects.', 'prefix' => 'projects'], function () {
        Route::get('/', 'all')->name('all');
        Route::get('/{slug}', 'index')->name('index');
    });
});




Route::controller(JobController::class)->group(function () {
    Route::group(['as' => 'jobs.', 'prefix' => 'jobs'], function () {
        Route::get('/', 'all')->name('all');
        Route::get('/{slug}', 'index')->name('index');
    });
});
