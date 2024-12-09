<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return redirect()->route('votes.index');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/votes',[VoteController::class,'index'])->name('votes.index');
    Route::get('/votes/create',[VoteController::class,'create'])->name('votes.create');
    Route::post('/votes',[VoteController::class,'store'])->name('votes.store');
    Route::get('/votes/{vote}',[VoteController::class,'show'])->name('votes.show');
    Route::post('/votes/{vote}/cast',[VoteController::class,'cast'])->name('votes.cast');
    Route::get('/votes/{vote}/results',[VoteController::class,'results'])->name('votes.results');
    Route::delete('/votes/{vote}',[VoteController::class,'destroy'])->name('votes.destroy');

    Route::middleware('admin')->group(function() {
        Route::get('/admin',[AdminController::class,'index'])->name('admin.index');
        Route::get('/admin/users',[AdminController::class,'users'])->name('admin.users');
        Route::get('/admin/votes',[AdminController::class,'votes'])->name('admin.votes');
    });
});

require __DIR__.'/auth.php';
