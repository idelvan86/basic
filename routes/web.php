<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SobreController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\TrocarSenhaController;
use App\Http\Controllers\PortfolioController;
use App\Models\User;
use App\Models\Portifolio;
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
    $marcas = DB::table('marcas')->get();
    $sobre  = DB::table('home_sobres')->first();
    $portfolio = Portifolio::all();
    return view('home', compact('marcas','sobre','portfolio'));
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
Route::get('/marcas/delete/{id}',[MarcaController::class,'Delete']);

//imagens routes

Route::get('/imagens/todas',[MarcaController::class,'Multimagem'])->name('multi.imagem');
Route::post('/imagens/adicionar',[MarcaController::class,'Addimagens'])->name('salvar.imagens');

// Admin Rotas

Route::get('/home/slider',[HomeController::class,'HomeSlider'])->name('home.slider');
Route::get('/add/slider',[HomeController::class,'AddSlider'])->name('add.slider');
Route::post('/salvar/slider',[HomeController::class,'SalvarSlider'])->name('salvar.slider');

// Sobre Paginas

Route::get('/home/sobre',[SobreController::class,'HomeAbout'])->name('home.sobre');
Route::get('/home/sobre/criar',[SobreController::class,'HomeAdd'])->name('add.sobre');
Route::post('/home/sobre/salvar',[SobreController::class,'HomeSalvar'])->name('salvar.sobre');

Route::get('/sobre/edit/{id}',[SobreController::class,'HomeEdit']);
Route::post('/sobre/update/{id}',[SobreController::class,'UpdateHome']);
Route::get('/sobre/delete/{id}',[SobreController::class,'Delete']);

// Serviço Paginas

Route::get('/home/servico',[ServicoController::class,'HomeServico'])->name('home.servico');
Route::get('/home/servico/criar',[ServicoController::class,'ServicoAdd'])->name('add.servico');
Route::post('/home/servico/salvar',[ServicoController::class,'ServicoSalvar'])->name('salvar.servico');

Route::get('/servico/edit/{id}',[ServicoController::class,'ServicoEdit']);
Route::post('/titulo/update/{id}',[ServicoController::class,'TituloUpdate']);
Route::post('/servico/update/{id}',[ServicoController::class,'ServicoUpdate']);
Route::get('/servico/delete/{id}',[ServicoController::class,'Delete']);

// Portfolio Paginas - Amnistrativas

Route::get('/home/portfolio',[PortfolioController::class,'HomePortfolio'])->name('home.portfolio');
Route::get('/home/portfolio/criar',[PortfolioController::class,'PortfolioAdd'])->name('add.portfolio');
Route::post('/home/portfolio/salvar',[PortfolioController::class,'PortfolioSalvar'])->name('salvar.portfolio');

// Portfolio Paginas - Site

Route::get('/portfolio',[PortfolioController::class,'Portfolio'])->name('portfolio');

// Contato Paginas - Amnistrativas
Route::get('/home/contato',[ContatoController::class,'HomeContato'])->name('home.contato');
Route::get('/home/contato/criar',[ContatoController::class,'ContatoAdd'])->name('add.contato');
Route::post('/home/contato/salvar',[ContatoController::class,'ContatoSalvar'])->name('salvar.contato');

Route::get('/contato/edit/{id}',[ContatoController::class,'ContatoEdit']);
Route::post('/contato/update/{id}',[ContatoController::class,'ContatoUpdate']);

Route::get('/contato/delete/{id}',[ContatoController::class,'Delete']);

// Contato Paginas - Site

Route::get('/contato',[ContatoController::class,'Contato'])->name('contato');
Route::post('/contato/form/',[ContatoController::class,'ContatoForm'])->name('contato.form');

// Contato Mensagem Paginas - Amnistrativas
Route::get('/home/contato/mensagem',[ContatoController::class,'HomeContatoMensagem'])->name('home.contatomensagem');
Route::get('/contato/form/delete/{id}',[ContatoController::class,'DeleteContatoForm']);


//Parte administrativa do site
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function(){
//$users = User::all();
    //$users = DB::table('users')->get();
    //return view('dashboard',compact('users'));
    return view('admin/index');
})->name('dashboard');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice'); 

Route::get('/user/logout',[MarcaController::class,'Logout'])->name('user.logout');

/// trocar senha
Route::get('/usuario/senha',[TrocarSenhaController::class,'TrocarSenha'])->name('mudar.senha');
Route::post ('/usuario/update/senha',[TrocarSenhaController::class,'UpdateSenha'])->name('senha.atualizar');

///Perfil Usuário
Route::get('/usuario/perfil',[TrocarSenhaController::class,'PerfilUpdate'])->name('profile.update');
Route::post ('/usuario/update/perfil',[TrocarSenhaController::class,'UpdateUsuario'])->name('profile.atualizar');


