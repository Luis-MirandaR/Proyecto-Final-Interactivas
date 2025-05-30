<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

use App\Models\Thread;

Route::get('/', function () {
    return redirect()->route('login');
})->name('home');

Route::get('dashboard', function () {
    $threads = Thread::all();
    return view('dashboard', compact('threads'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');

    Route::get('threads/pdf', [\App\Http\Controllers\ThreadController::class, 'pdf'])->name('threads.pdf');

    Route::get('suscribedthreads', [\App\Http\Controllers\SuscribedThreadsController::class, 'index'])->name('suscribed_threads');
    Route::post('suscribedthreads', [\App\Http\Controllers\SuscribedThreadsController::class, 'store'])->name('suscribed_threads.store');

    Route::get('categories', [\App\Http\Controllers\CategoryController::class, 'index'])->name('categories');
    Route::post('categories', [\App\Http\Controllers\CategoryController::class, 'store'])->name('categories.store');
    Route::delete('categories/{category}', [\App\Http\Controllers\CategoryController::class, 'destroy'])->name('categories.destroy');

    Route::get('threads', [\App\Http\Controllers\ThreadController::class, 'index'])->name('threads');
    Route::get('threads/create', [\App\Http\Controllers\ThreadController::class, 'create'])->name('threads.create');
    Route::post('threads', [\App\Http\Controllers\ThreadController::class, 'store'])->name('threads.store');
    Route::get('threads/{thread}', [\App\Http\Controllers\ThreadController::class, 'show'])->name('threads.show');
    Route::delete('threads/{thread}', [\App\Http\Controllers\ThreadController::class, 'destroy'])->name('threads.destroy');
    Route::get('threads/{thread}/edit', [\App\Http\Controllers\ThreadController::class, 'edit'])->name('threads.edit');
    Route::put('threads/{thread}', [\App\Http\Controllers\ThreadController::class, 'update'])->name('threads.update');
    

    Route::get('games', [\App\Http\Controllers\GameController::class, 'index'])->name('games');
    Route::get('games/create', [\App\Http\Controllers\GameController::class, 'create'])->name('games.create');
    Route::post('games', [\App\Http\Controllers\GameController::class, 'store'])->name('games.store');
    Route::get('games/{game}/edit', [\App\Http\Controllers\GameController::class, 'edit'])->name('games.edit');
    Route::put('games/{game}', [\App\Http\Controllers\GameController::class, 'update'])->name('games.update');
    Route::delete('games/{game}', [\App\Http\Controllers\GameController::class, 'destroy'])->name('games.destroy');


    
});

require __DIR__.'/auth.php';