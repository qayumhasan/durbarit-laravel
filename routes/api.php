<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResource('/category','Admin\CategoryController');
Route::apiResource('/whychoseus','Admin\WhyChoseUsController');

Route::prefix('slider')->namespace('Frontend')->group(function () {
    Route::get('/','FrontendController@slider');
});

Route::prefix('service')->namespace('Frontend')->group(function () {
  Route::get('/','FrontendController@searvices');
});

Route::prefix('partners')->namespace('Frontend')->group(function () {
  Route::get('/','FrontendController@partners');
});

Route::prefix('logos')->namespace('Frontend')->group(function () {
    Route::get('/','FrontendController@logos');
  });
