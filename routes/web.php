<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/artisan-runner', [\Webkul\Admin\Http\Controllers\ArtisanRunnerController::class, 'index'])
    ->defaults('_config', ['view' => 'admin::artisan-runner.index'])
    ->name('admin.artisan-runner');

Route::post('/artisan-runner/run', [\Webkul\Admin\Http\Controllers\ArtisanRunnerController::class, 'run'])
    ->name('admin.artisan-runner.run');