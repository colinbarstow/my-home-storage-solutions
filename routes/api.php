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

Route::prefix('assets')->name('assets.')->group(function()
{
    Route::prefix('materials')->name('materials.')->group(function()
    {
        Route::get('get-materials', 'StorageConfiguratorController@getMaterials');
    });
});
