<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

function generalRoutes(string $prefix, mixed $class) {
    Route::get("/{$prefix}", [$class, 'getAll']);
    Route::get("/{$prefix}/{id}", [$class, 'get']);
    Route::post("/{$prefix}", [$class, 'create']);
    Route::put("/{$prefix}/{id}", [$class, 'update']);
    Route::delete("/{$prefix}/{id}", [$class, 'delete']);
}

generalRoutes('category', CategoryController::class);
generalRoutes('task', TaskController::class);
