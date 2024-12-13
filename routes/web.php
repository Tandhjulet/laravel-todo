<?php

use App\Livewire\Counter;
use App\Livewire\TaskOverview;
use App\Livewire\ViewTask;
use App\Models\Task;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/counter', Counter::class);

Route::get('/tasks', TaskOverview::class);