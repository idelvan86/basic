<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\Portifolio;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\DB;
use Image;

class PortfolioController extends Controller
{
    public function HomePortfolio(){
        $portfolio = Portifolio::latest()->get();
        return view('admin.portfolio.index', compact('portfolio'));
     }
    
     public function PortfolioAdd(){
        return view('admin.portfolio.create');
     }
    
     public function PortfolioSalvar(Request $request){

        $validated = $request->validate([
            'titulo' => 'required',
            'texto'  => 'required',
            'link'   => 'required',
            'marca_imagem' => 'required|mimes:jpg,jpeg,png',
        ],
        [
            'marca_nome.required' => 'Por favor informe a Marca!',
        ]);

        //---------------------------------------------------------------------------------------------
        //Gerar Nome do Arquivo e informar local onde será salvo!
        // $marca_imagem = $request->file('marca_imagem');
        
        // $gera_nome     = hexdec(uniqid());
        // $imagem_ext    = strtolower($marca_imagem->getClientOriginalExtension());
        // $imagem_nome   =  $gera_nome.'.'.$imagem_ext;
        // $local_salvar  = 'image/marca/';
        // $salvar_imagem = $local_salvar. $imagem_nome;

        // $marca_imagem->move($local_salvar,$imagem_nome);
        //---------------------------------------------------------------------------------------------
        //Gerar Imagem Intervensão editando o tamanho da imagem 

        $portfolio_imagem = $request->file('imagem');

        $gera_nome = hexdec(uniqid()).'.'.$portfolio_imagem->getClientOriginalExtension();
        Image::make($portfolio_imagem)->resize(100,100)->save('image/portfolio/'.$gera_nome);
        $salvar_imagem = 'image/portfolio/'.$gera_nome;

        //---------------------------------------------------------------------------------------------

        //Salvar 
        Portifolio::insert([
            'titulo'    => $request -> titulo,
            'texto'     => $request -> texto,
            'link'      => $request -> link,
            'imagem'    => $salvar_imagem,
            'created_at'    => Carbon::now()
        ]);
   
        return Redirect()->back('home.portfolio')->with('success','Portfolio criado com sucesso!');

    }    




    }
