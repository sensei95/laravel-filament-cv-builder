<?php

use App\Http\Controllers\Profile\Experiences\ShowController as ExperiencesShowController;
use App\Http\Controllers\Profile\Links\ShowController as LinksShowController;
use App\Http\Controllers\Profile\Links\Template\ShowController as LinksTemplateShowController;
use App\Http\Controllers\Profile\ShowController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->prefix('profile')->as('profile.')->group(function () {
    Route::get('/', ShowController::class)->name('show');
    Route::prefix('experiences')->as('experiences.')->group(function () {
        Route::get('/', ExperiencesShowController::class)->name('show');
    });
    Route::prefix('links')->as('links.')->group(function () {
        Route::get('/', LinksShowController::class)->name('show');
        Route::get('/{link:token}', LinksTemplateShowController::class)->name('template');
    });
});

require __DIR__.'/auth.php';
