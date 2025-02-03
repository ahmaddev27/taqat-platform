<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TalentController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\Auth\LoginController;



Route::get('/clear', function () {
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return redirect()->route('home');
});


Auth::routes();

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('logout/talent-company', [LoginController::class, 'logoutClient'])->name('logout-Clients');



Route::get('/', function () {
    return view('front.pages.home');
})->name('home');


Route::controller(TalentController::class)->group(function () {
    Route::group(['as' => 'talents.', 'prefix' => 'talents'], function () {
        Route::get('/', 'all')->name('all');
        Route::get('/{slug}', 'index')->name('index');
    });
});


Route::controller(CompanyController::class)->group(function () {
    Route::group(['as' => 'companies.', 'prefix' => 'companies'], function () {
        Route::get('/', 'all')->name('all');
        Route::get('/{id}', 'index')->name('index');
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


Route::controller(ServicesController::class)->group(function () {
    Route::group(['as' => 'services.', 'prefix' => 'services'], function () {
        Route::get('/', 'all')->name('all');
        Route::get('/{slug}', 'index')->name('index');
    });
});
