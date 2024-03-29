<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




use App\Http\Controllers\CursoController;
use App\Http\Controllers\GradoController;
use App\Http\Controllers\DocenteController;

use App\Http\Controllers\RegisterController;

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

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [RegisterController::class, 'login']);
    
Route::resource('docentes', DocenteController::class);     
Route::middleware('auth:api')->group( function () {

Route::resource('grados', GradoController::class);
Route::resource('cursos', CursoController::class);



 
    
});