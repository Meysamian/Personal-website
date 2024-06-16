<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/saveMessage', [ContactController::class, 'saveMessage'])->name('saveMessage');

Route::get('/about', [IndexController::class, 'about'])->name('about');
Route::get('/services', [IndexController::class, 'services'])->name('services');
Route::get('/experiences', [IndexController::class, 'experiences'])->name('experiences');
Route::get('/educations', [IndexController::class, 'educations'])->name('educations');
Route::get('/skills', [IndexController::class, 'skills'])->name('skills');
Route::get('/certifications', [IndexController::class, 'certifications'])->name('certifications');
Route::get('/interests', [IndexController::class, 'interests'])->name('interests');
Route::get('/contact', [IndexController::class, 'contact'])->name('contact');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
