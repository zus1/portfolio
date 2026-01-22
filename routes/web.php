<?php

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return Redirect::route('about.get');
});

Route::get('about', \App\Http\Controllers\About\GetController::class)->name('about.get');
Route::get('posts/{category}', \App\Http\Controllers\Posts\ListController::class)->name('post.list');
