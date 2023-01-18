<?php

use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\TaskWorkController;
use App\Http\Controllers\MaterialTaskController;
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

Route::get('/worker/allOpen', [WorkerController::class, 'allOpen'])->name('workers.allOpen');
Route::resource('workers', WorkerController::class)
    ->only(['index', 'create','edit'])
    ->middleware(['auth', 'verified']);

Route::get('/tasks/registerWorker', [TaskController::class, 'registerWorker'])->name('tasks.registerWorker');
Route::get('/tasks/registerUsedMaterial', [TaskController::class, 'registerUsedMaterial'])->name('tasks.registerUsedMaterial');
Route::resource('tasks', TaskController::class)
    ->only(['index','create','edit','show','store'])
    ->middleware(['auth', 'verified']);

Route::get('/projects/async', [ProjectController::class, 'async'])->name('projects.async');
Route::resource('projects', ProjectController::class)
    ->only(['index','create', 'edit'])
    ->middleware(['auth', 'verified']);

Route::get('/materials/async', [MaterialController::class, 'async'])->name('materials.async');
Route::resource('materials', MaterialController::class)
    ->only(['index','create', 'edit'])
    ->middleware(['auth', 'verified']);

Route::get('/units/allOpen', [UnitController::class, 'allOpen'])->name('units.allOpen');
Route::resource('units', UnitController::class)
    ->only(['index', 'create','edit'])
    ->middleware(['auth', 'verified']);

Route::get('/types/allOpen', [TypeController::class, 'allOpen'])->name('types.allOpen');
Route::resource('types', TypeController::class)
    ->only(['index', 'create','edit'])
    ->middleware(['auth', 'verified']);

Route::resource('task_workers', TaskWorkController::class)
    ->only(['index', 'store'])
    ->middleware(['auth', 'verified']);


/*Route::resource('materialtasks', MaterialTaskController::class)
    ->only(['index','create', 'edit'])
    ->middleware(['auth', 'verified']);*/

require __DIR__.'/auth.php';
