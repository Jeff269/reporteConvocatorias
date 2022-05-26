<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostulacionController;

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

Route::get('reportes/reqmin', [PostulacionController::class, 'reporteReqMinimos']);
Route::get('reportes/evconocimientos', [PostulacionController::class, 'reporteEvConocimientos']);
Route::get('reportes/evcurricular', [PostulacionController::class, 'reporteEvCurricular']);
Route::get('reportes/final', [PostulacionController::class, 'reporteEntrevista']);