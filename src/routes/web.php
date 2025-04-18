<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeightLogController;

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

Route::get('/register/step1', [WeightLogController::class, 'getStep1']);
Route::post('/register/step1', [WeightLogController::class, 'postStep1']);
Route::get('/register/step2', [WeightLogController::class, 'getStep2']);
Route::post('/register/step2', [WeightLogController::class, 'postStep2']);
Route::post('/logout', [WeightLogController::class, 'logout']);
Route::post('/login', [WeightLogController::class, 'login']);

Route::middleware(['auth'])->group(function() {
  Route::get('/weight_logs', [WeightLogController::class, 'index']);
  Route::post('/weight_logs/create', [WeightLogController::class, 'create']);
  Route::get('/weight_logs/search', [WeightLogController::class, 'getSearch']);
  Route::post('/weight_logs/search', [WeightLogController::class, 'postSearch']);
  Route::get('/weight_logs/{:weightLogId}/update', [WeightLogController::class, 'getUpdate']);
  Route::post('/weight_logs/{:weightLogId}', [WeightLogController::class, 'postUpdate']);
  Route::post('/weight_logs/{:weightLogId}/delete', [WeightLogController::class, 'postDelete']);
  Route::get('/weight_logs/goal_setting', [WeightLogController::class, 'getGoal']);
  Route::post('/weight_logs/goal_setting', [WeightLogController::class, 'postGoal']);
});
