<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedController;

Route::get('/', [FeedController::class, 'index'])->name('feed');
Route::get('/feed', [FeedController::class, 'index'])->name('feed.index');
Route::get('/messages', [FeedController::class, 'messages'])->name('messages');
Route::get('/events', [FeedController::class, 'events'])->name('events');
Route::get('/event-detail', [FeedController::class, 'eventDetail'])->name('event.detail');
Route::get('/pages', [FeedController::class, 'pages'])->name('pages');
Route::get('/page-detail', [FeedController::class, 'pageDetail'])->name('page.detail');
Route::get('/groups', [FeedController::class, 'groups'])->name('groups');
Route::get('/group-detail', [FeedController::class, 'groupDetail'])->name('group.detail');
Route::get('/blog', [FeedController::class, 'blog'])->name('blog');
Route::get('/blog-read', [FeedController::class, 'blogRead'])->name('blog.read');
Route::get('/profile', [FeedController::class, 'profile'])->name('profile');
Route::get('/settings', [FeedController::class, 'settings'])->name('settings');
Route::get('/login', [FeedController::class, 'login'])->name('login');
Route::get('/register', [FeedController::class, 'register'])->name('register');
