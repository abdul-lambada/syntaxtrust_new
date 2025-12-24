<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ProcessStepController;
use App\Http\Controllers\Admin\TimelineStepController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\ContactInfoController;
use App\Http\Controllers\Admin\PromoController;
use App\Http\Controllers\Admin\MeetingRequestController;
use App\Http\Controllers\Admin\TechnologyController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;

Route::get('/', [HomeController::class, 'index']);

Route::view('/privacy', 'privacy');
Route::view('/terms', 'terms');

// Admin Auth
Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/login', [LoginController::class, 'show'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.post');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::middleware('auth')->group(function(){
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('services', ServiceController::class)->except(['show']);
        Route::resource('process', ProcessStepController::class)->parameters(['process' => 'process'])->except(['show']);
        Route::resource('timeline', TimelineStepController::class)->parameters(['timeline' => 'timeline'])->except(['show']);
        Route::resource('testimonials', TestimonialController::class)->except(['show']);
        Route::resource('faqs', FaqController::class)->except(['show']);
        Route::resource('contacts', ContactInfoController::class)->except(['show']);
        Route::resource('promos', PromoController::class)->except(['show']);
        Route::resource('meeting-requests', MeetingRequestController::class)->except(['create','store','show']);
        Route::resource('technologies', TechnologyController::class)->except(['show']);
        Route::resource('settings', SiteSettingController::class)->except(['show']);
        Route::resource('projects', ProjectController::class)->except(['show']);
    });
});
