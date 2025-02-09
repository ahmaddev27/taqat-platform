<?php


use App\Http\Controllers\Company\CompanyLoginController;
use App\Http\Controllers\Company\ProfileController;
use App\Http\Controllers\Company\ProjectController;
use App\Http\Controllers\Company\JobController;
use Illuminate\Support\Facades\Route;


Route::post('company/login', [CompanyLoginController::class, 'login'])->name('company.login');


Route::group(['as' => 'company.', 'prefix' => 'company' ,'middleware' => 'auth.company'], function () {


    Route::group(['as' => 'profile.', 'prefix' => 'profile'], function () {
        Route::controller(ProfileController::class)->group(function () {
            Route::get('/', 'profile')->name('index');
            Route::post('/update', 'update')->name('update');
        });
    });


    Route::group(['as' => 'projects.', 'prefix' => 'projects'], function () {
        Route::controller(ProjectController::class)->group(function () {
            Route::get('/', 'projects')->name('all');
            Route::view('/new', 'front.pages.company-dashboard.project.add')->name('add');
            Route::post('/store', 'store')->name('store');
        });
    });

    Route::group(['as' => 'jobs.', 'prefix' => 'jobs'], function () {
        Route::controller(JobController::class)->group(function () {
            Route::get('/', 'jobs')->name('all');
            Route::view('/new', 'front.pages.company-dashboard.jobs.add')->name('add');
            Route::post('/store', 'store')->name('store');

        });
    });

});
