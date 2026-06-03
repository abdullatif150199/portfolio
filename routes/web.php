<?php

use App\Livewire\Public\HomePage;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\AboutManager;
use App\Livewire\Admin\SkillsManager;
use App\Livewire\Admin\ProjectsManager;
use App\Livewire\Admin\ExperienceManager;
use App\Livewire\Admin\ClientsManager;
use App\Livewire\Admin\TestimonialsManager;
use App\Livewire\Auth\Login;
use Illuminate\Support\Facades\Route;

// Public site
Route::get('/', HomePage::class)->name('home');

// Auth (single login screen for admin)
Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login');
});

Route::post('/logout', function () {
    auth()->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect()->route('home');
})->name('logout');

// Admin dashboard
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', Dashboard::class)->name('dashboard');
    Route::get('/about', AboutManager::class)->name('about');
    Route::get('/skills', SkillsManager::class)->name('skills');
    Route::get('/projects', ProjectsManager::class)->name('projects');
    Route::get('/experiences', ExperienceManager::class)->name('experiences');
    Route::get('/clients', ClientsManager::class)->name('clients');
    Route::get('/testimonials', TestimonialsManager::class)->name('testimonials');
});
