<?php

use App\Http\Controllers\IpsController;
use App\Http\Controllers\PacienteController;
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

// Route::resource('aseguradoras', AseguradoraController::class);
Route::resource('ips', IpsController::class);
Route::resource('pacientes', PacienteController::class);

Route::get('/', function () {
    return view('welcome');
});
