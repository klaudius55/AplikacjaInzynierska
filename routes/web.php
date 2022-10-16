<?php

use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\WorkTimeController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('workers', WorkerController::class)
    ->only(['index', 'store'])
    ->middleware(['auth', 'verified']);

Route::resource('workers', WorkerController::class)
   ->only(['index', 'create'])
    ->middleware(['auth', 'verified']);


Route::resource('tasks', TaskController::class)
    ->only(['index', 'store'])
    ->middleware(['auth', 'verified']);

Route::resource('projects', ProjectController::class)
    ->only(['index', 'store'])
    ->middleware(['auth', 'verified']);

Route::resource('materials', MaterialController::class)
    ->only(['index', 'store'])
    ->middleware(['auth', 'verified']);

Route::resource('units', UnitController::class)
    ->only(['index', 'store'])
    ->middleware(['auth', 'verified']);

Route::resource('types', TypeController::class)
    ->only(['index', 'store'])
    ->middleware(['auth', 'verified']);

Route::resource('workTimes', WorkTimeController::class)
    ->only(['index', 'store'])
    ->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';
