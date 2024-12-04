<?php

use App\Http\Controllers\API\UserController;
use App\Http\Controllers\ManagerController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/user/login', [UserController::class, 'login']);
Route::get('/manager/{id}', [UserController::class, 'managerDetail'])->middleware('auth:sanctum');

