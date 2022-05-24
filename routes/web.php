<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\MarcaController;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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

Route::get('/sobre', function () {
    //echo "pagina sobre" ;
    return view('sobre');
});   

//Route::get('/contato', function () {
    //echo "pagina contato" ;
  //  return view('contato');
//});   

//name (serve como um apelido tb serve como encurtador de endereço caso precise!)

Route::get('/contato',[ContatoController::class,'index'])->name('con');


//Categorias
Route::get('/categorias/todas',[CategoriaController::class,'AllCat'])->name('all.categorias');

Route::post('/categorias/adicionar',[CategoriaController::class,'AddCat'])->name('salvar.categoria');

Route::get('/categorias/edit/{id}',[CategoriaController::class,'Edit']);
Route::post('/categorias/update/{id}',[CategoriaController::class,'Update']);

Route::get('/softdelete/categorias/{id}',[CategoriaController::class,'SoftDelete']);
Route::get('/categorias/restaurar/{id}',[CategoriaController::class,'Restaurardado']);
Route::get('/apagarp/categorias/{id}',[CategoriaController::class,'Apagarpermanente']);

//Marca

Route::get('/marcas/todas',[MarcaController::class,'AllMarca'])->name('all.marca');

Route::post('/marcas/adicionar',[MarcaController::class,'AddMarca'])->name('salvar.marca');
Route::get('/marcas/edit/{id}',[MarcaController::class,'EditMarca']);
Route::post('/marcas/update/{id}',[MarcaController::class,'Update']);


//Parte administrativa do site
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function(){
//$users = User::all();
    $users = DB::table('users')->get();
    return view('dashboard',compact('users'));
})->name('dashboard');