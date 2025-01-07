<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Talent\ProfileController;
use App\Http\Controllers\Talent\EducationController;
use App\Http\Controllers\Auth\TalentLoginController;


Route::get('talent/login', [TalentLoginController::class, 'showLoginForm'])->name('talent.login.show');
Route::post('talent/login', [TalentLoginController::class, 'login'])->name('talent.login');
Route::view('talent/register', 'front.themes.' . \setting('them') . '.talents.register')->name('talent.register');
Route::post('talent/register', [TalentLoginController::class, 'register'])->name('talent.register');
Route::post('talent/logout', [TalentLoginController::class, 'logout'])->name('talent.logout');


Route::group(['as' => 'profile.', 'prefix' => 'profile', 'middleware' => 'auth.talent'], function () {
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/', 'profile')->name('index');
        Route::post('/update', 'update')->name('update');
    });
});



Route::group(['as' => 'edu.', 'prefix' => 'edu', 'middleware' => 'auth.talent'], function () {
    Route::controller(EducationController::class)->group(function () {
        Route::post('/store', 'store')->name('store');
        Route::post('/delete', 'delete')->name('delete');
        Route::get('/education/{id}', 'edit')->name('edit');
        Route::post('/update', 'update')->name('update');
    });
});
