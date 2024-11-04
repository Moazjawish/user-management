<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/projects', function () {
    return view('home');
});

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/create', [UserController::class, 'create']);
Route::get('/users/{user}', [UserController::class, 'show']);
Route::post('/users/store', [UserController::class, 'store']);
Route::delete('/users/{user}/delete', [UserController::class, 'destroy']);
Route::get('/users/{user}/edit', [UserController::class, 'edit']);
Route::patch('/users/{user}/update', [UserController::class, 'update']);

Route::get('/projects',[ProjectController::class,'index']);
Route::get('/projects/create',[ProjectController::class,'create']);
Route::get('/projects/{project}',[ProjectController::class,'show']);
Route::post('/projects/store',[ProjectController::class,'store']);
Route::get('/projects/{project}/edit',[ProjectController::class,'edit']);
Route::delete('/projects/{project}/delete', [ProjectController::class, 'delete']);

Route::get('/tasks',[TaskController::class,'index']);
Route::post('/projects/{project}/tasks/store',[TaskController::class,'store']);
Route::get('/projects/{project}/tasks/{task}/edit',[TaskController::class,'edit']);
Route::patch('/projects/{project}/tasks/{task}/update',[TaskController::class,'update']);
Route::delete('/projects/{project}/tasks/{task}/delete',[TaskController::class,'delete']);
Route::get('/projects/{project}/tasks/',[TaskController::class,'create']);



Route::patch('/projects/{project}/update', [ProjectController::class,'update']);





