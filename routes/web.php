<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostInteractionController;

// ── Auth (guest only) ──────────────────────────────────────
Route::middleware('guest')->group(function () {
    Route::get('/login',     [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login',    [AuthController::class, 'authenticate'])->name('login.post');
    Route::get('/register',  [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'store'])->name('register.post');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// ── Protected pages ────────────────────────────────────────
Route::middleware('auth')->group(function () {
    Route::get('/',             [FeedController::class, 'index'])->name('feed');
    Route::get('/feed',         [FeedController::class, 'index'])->name('feed.index');
    Route::get('/messages',     [FeedController::class, 'messages'])->name('messages');
    Route::get('/events',       [FeedController::class, 'events'])->name('events');
    Route::get('/event-detail', [FeedController::class, 'eventDetail'])->name('event.detail');
    Route::get('/pages',        [FeedController::class, 'pages'])->name('pages');
    Route::get('/page-detail',  [FeedController::class, 'pageDetail'])->name('page.detail');
    Route::get('/groups',       [FeedController::class, 'groups'])->name('groups');
    Route::get('/group-detail', [FeedController::class, 'groupDetail'])->name('group.detail');
    Route::get('/blog',         [FeedController::class, 'blog'])->name('blog');
    Route::get('/blog-read',    [FeedController::class, 'blogRead'])->name('blog.read');
    Route::get('/profile',      [FeedController::class, 'profile'])->name('profile');
    Route::get('/settings',          [FeedController::class, 'settings'])->name('settings');
    Route::post('/settings/profile', [SettingsController::class, 'updateProfile'])->name('settings.profile');
    Route::post('/settings/social',  [SettingsController::class, 'updateSocial'])->name('settings.social');
    Route::post('/settings/password',[SettingsController::class, 'updatePassword'])->name('settings.password');
    Route::post('/settings/avatar',  [SettingsController::class, 'updateAvatar'])->name('settings.avatar');
    Route::post('/settings/cover',   [SettingsController::class, 'updateCover'])->name('settings.cover');

    // Posts
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

    // Post interactions
    Route::post('/posts/{post}/like',                          [PostInteractionController::class, 'toggleLike'])->name('posts.like');
    Route::post('/posts/{post}/share',                         [PostInteractionController::class, 'toggleShare'])->name('posts.share');
    Route::post('/posts/{post}/comments',                      [PostInteractionController::class, 'storeComment'])->name('posts.comment');
    Route::post('/posts/{post}/comments/{comment}/reply',      [PostInteractionController::class, 'storeReply'])->name('posts.reply');
    Route::get('/posts/{post}/likers',                         [PostInteractionController::class, 'likers'])->name('posts.likers');
    Route::get('/posts/{post}/sharers',                        [PostInteractionController::class, 'sharers'])->name('posts.sharers');

    // Groups / Events / Blog create
    Route::post('/groups',               [GroupController::class, 'store'])->name('groups.store');
    Route::post('/events',               [EventController::class, 'store'])->name('events.store');
    Route::post('/blog',                 [BlogController::class,  'store'])->name('blog.store');

    // Albums
    Route::post('/albums',                        [AlbumController::class, 'store'])->name('albums.store');
    Route::post('/albums/{album}/photos',         [AlbumController::class, 'uploadPhoto'])->name('albums.upload');
    Route::patch('/albums/{album}',               [AlbumController::class, 'rename'])->name('albums.rename');
    Route::delete('/albums/{album}',              [AlbumController::class, 'destroy'])->name('albums.destroy');
});
