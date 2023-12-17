<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\RespuestasController;
use App\Http\Controllers\AliasController;
use App\Http\Controllers\KahootController;
use App\Http\Controllers\MenuController;
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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/',function (){
    return view('app.base');
});

Route::resource('respuesta', RespuestasController::class);
Route::resource('game', GameController::class);


Route::resource('Admin', MenuController::class);


Route::get('Client', [AliasController::class, 'showForm'])->name('client.form');
Route::post('Client', [AliasController::class, 'saveAlias'])->name('client.saveAlias');

Route::get('/mostrar-alias', function () {
    $alias = session('alias');
    return "El alias almacenado en la sesión es: $alias";
});
Route::get('/kahoot', [KahootController::class, 'index']);
Route::get('/kahoot', [KahootController::class, 'index'])->name('kahoot.index');
Route::post('/kahoot/verificar/{preguntaId}/{respuestaId}', [KahootController::class, 'verificarRespuesta'])->name('verificar.respuesta');


Route::get('/kahoot/historial', [KahootController::class, 'historial']);
