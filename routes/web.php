<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedController;

Route::get('/', [FeedController::class, 'index'])->name('feed');
Route::get('/feed', [FeedController::class, 'index'])->name('feed.index');
Route::get('/messages', [FeedController::class, 'messages'])->name('messages');
Route::get('/events', [FeedController::class, 'events'])->name('events');
