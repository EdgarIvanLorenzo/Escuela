<?php

use Illuminate\Support\Facades\Route;
//Referencia para la creacion del controlador
//Todo App debe de ser en mayusculas
use App\Http\Controllers\SesionController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\Lista;
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


//Ruta predefinida
Route::get('/', function () {
    return view('welcome',['nombre'=>'Edgar','edad'=>'20']);
});

//Route::view('/','welcome',['nombre'=>'Edgar','edad'=>'20']);


/*Creacion de la ruta para obtener una vista en base al controlador y manda a llamar a la funcion index
del controlador*/
//Route::get('/Sesion/index',[SesionController::class,'index']);
//Route::get('Sesion/create', array(SesionController::class,'create'));



//Todo Sesion
//Route::get('/getUser',[SesionController::class,'getUserForName']);
Route::post('/getUserData',[SesionController::class,'getUserForNameData']);
//Generacion masiva de rutas atraves de los controladores
Route::resource('Sesion',\App\Http\Controllers\SesionController::class);
Route::resource('Materia',\App\Http\Controllers\MateriaController::class);
Route::resource('Grupos',\App\Http\Controllers\GrupoController::class);
Route::resource('Alumnos',\App\Http\Controllers\AlumnosController::class);
Route::resource('CargaMaterias',\App\Http\Controllers\CargaMateriaController::class);
Route::resource('Lista',\App\Http\Controllers\Lista::class);



