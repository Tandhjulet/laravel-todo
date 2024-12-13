<?php

use App\Livewire\Counter;
use App\Livewire\ViewTask;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/counter', Counter::class);

Route::get('/task', ViewTask::class);
