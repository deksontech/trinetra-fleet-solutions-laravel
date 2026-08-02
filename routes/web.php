<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\LeadController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::middleware('throttle:120,1')->group(function () {
    Route::get('/', [PublicController::class, 'home'])->name('home');
    Route::get('/about', [PublicController::class, 'about'])->name('about');
    Route::get('/fleet', [PublicController::class, 'fleet'])->name('fleet.index');
    Route::get('/fleet/{slug}', [PublicController::class, 'vehicle'])->name('fleet.show');
    Route::get('/services', [PublicController::class, 'services'])->name('services.index');
    Route::get('/services/{slug}', [PublicController::class, 'service'])->name('services.show');
    Route::get('/locations', [PublicController::class, 'locations'])->name('locations.index');
    Route::get('/locations/{slug}', [PublicController::class, 'location'])->name('locations.show');
    Route::get('/tours', [PublicController::class, 'tours'])->name('tours.index');
    Route::get('/tours/{slug}', [PublicController::class, 'tour'])->name('tours.show');
    Route::get('/clients-gallery', [PublicController::class, 'clientsGallery'])->name('clients-gallery');
    Route::get('/gallery', [PublicController::class, 'gallery'])->name('gallery');
    Route::get('/blog', [PublicController::class, 'blog'])->name('blog.index');
    Route::get('/blog/{slug}', [PublicController::class, 'post'])->name('blog.show');
    Route::get('/careers', [PublicController::class, 'careers'])->name('careers.index');
    Route::get('/careers/{slug}', [PublicController::class, 'career'])->name('careers.show');
    Route::get('/contact', [PublicController::class, 'contact'])->name('contact');
    Route::get('/request-a-quote', [PublicController::class, 'quote'])->name('quote');
    Route::get('/legal', [PublicController::class, 'legalIndex'])->name('legal.index');
    Route::get('/legal/{slug}', [PublicController::class, 'legal'])->name('legal.show');
    Route::get('/sitemap-page', [PublicController::class, 'sitemapPage'])->name('sitemap.page');
    Route::get('/sitemap.xml', [PublicController::class, 'sitemapXml'])->name('sitemap.xml');
    Route::get('/robots.txt', [PublicController::class, 'robots'])->name('robots');
    Route::get('/success/{reference}', [PublicController::class, 'success'])->name('success');
});

Route::post('/request-a-quote', [FormController::class, 'quote'])->middleware('throttle:8,1')->name('forms.quote');
Route::post('/contact', [FormController::class, 'contact'])->middleware('throttle:8,1')->name('forms.contact');
Route::post('/careers/apply', [FormController::class, 'career'])->middleware('throttle:6,1')->name('forms.career');

Route::get('/admin/login', [AuthController::class, 'login'])->middleware('guest')->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'authenticate'])->middleware('guest', 'throttle:5,1')->name('admin.authenticate');
Route::post('/admin/logout', [AuthController::class, 'logout'])->middleware('auth')->name('admin.logout');
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', DashboardController::class)->name('dashboard');
    Route::get('/leads', [LeadController::class, 'index'])->name('leads.index');
    Route::get('/content/{module}', [ContentController::class, 'index'])->name('content.index');
});
