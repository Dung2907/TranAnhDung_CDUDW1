<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\ProductController;
use App\Http\Controllers\frontend\ContactController;

Route::get('/',[HomeController::class ,'index']);
Route::get('/san-pham',[ProductController::class ,'index']);
Route::get('/chi-tiet-san-pham/{slug}',[ProductController::class ,'product_detail']);
Route::get('/lien-he',[ContactController::class ,'index']);
