<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\Servico;
use App\Models\Servico_titulo;

class ServicoController extends Controller
{
 
    public function HomeServico(){
        $servico = Servico::latest()->get();
        $titulo = Servico_titulo::find(1);
        return view('admin.servico.index', compact('servico','titulo'));
    }

    public function ServicoAdd(){
        $servico = Servico::latest()->get();
        return view('admin.servico.create', compact('servico'));
     }

     public function ServicoSalvar(Request $request){

        $validated = $request->validate([
           'card_icone'  => 'required',
           'card_titulo' => 'required',
           'card_descricao' => 'required',
       ],
       [
           'card_icone.required'   => 'Por favor informe o icone!',
           'card_titulo.required'  => 'Por favor informe o Titulo do Card',
           'card_descricao.required'  => 'Por favor informe a descrição do Card !',
       ]);
       //---------------------------------------------------------------------------------------------
     
       //Salvar 
       Servico::insert([
           'card_icone'     => $request -> card_icone,
           'card_titulo'    => $request -> card_titulo,
           'card_descricao' => $request -> card_descricao,
           'created_at'  => Carbon::now()
       ]);
     
       return Redirect()->route('home.servico')->with('success','Servico inserido com sucesso!');
      }

      public function Servico_tituloSalvar(Request $request){

        $validated = $request->validate([
           'titulo' => 'required',
           'titulo_descricao' => 'required',
       ],
       [
           'titulo.required'  => 'Por favor informe o Titulo do Card',
           'titulo_descricao.required'  => 'Por favor informe a descrição do Card !',
       ]);
       //---------------------------------------------------------------------------------------------
     
       //Salvar 
       Servico::insert([
           'titulo'    => $request -> card_titulo,
           'titulo_descricao' => $request -> card_descricao,
           'created_at'  => Carbon::now()
       ]);
     
       return Redirect()->route('home.servico')->with('success','Servico inserido com sucesso!');
      }




     
      public function ServicoEdit($id){
         $servico = Servico::find($id);
         return view('admin.servico.edit',compact('servico'));
      }


      public function ServicoUpdate(Request $request,$id){

        /*
        $validated = $request->validate([
            'marca_nome' => 'required|min:4',
            
        ],
        [
            'marca_nome.required' => 'Por favor informe a Marca!',
            'marca_imagem.min' => 'Poucos caracteres na Marca "menos de 4 caracteres"',
        ]);
    */
    
            //Atualizar 
           $update = Servico::find($id)->update([
                //dd($request),
                'titulo'         => 0,
                'card_icone'     => $request -> card_icone,
                'card_titulo'    => $request -> card_titulo,
                'card_descricao' => $request -> card_descricao,
            ]);
    
            return Redirect()->route('home.servico')->with('success','Serviço Atualizado com sucesso!');
           
    }

     public function TituloUpdate(Request $request,$id){

       /*
       $validated = $request->validate([
           'marca_nome' => 'required|min:4',
           
       ],
       [
           'marca_nome.required' => 'Por favor informe a Marca!',
           'marca_imagem.min' => 'Poucos caracteres na Marca "menos de 4 caracteres"',
       ]);
   */
   
           //Atualizar 
          $update = Servico::find($id)->update([
               //dd($request),
               'titulo'         => $request -> titulo,
               'titulo_descricao'    => $request -> titulo_descricao,
           ]);
   
           return Redirect()->route('home.servico')->with('success','Titulo Atualizado com sucesso!');
          
   }




    public function Delete($id){

        $delete = Servico::find($id)->delete();
        return Redirect()->back()->with('success','Serviço deletado com sucesso!');
       
    }




}
