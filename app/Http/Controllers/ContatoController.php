<?php

namespace App\Http\Controllers;
use App\Models\contato;
use App\Models\ContatoForm;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class ContatoController extends Controller
{
    public function HomeContato(){
        $contato = contato::All();
        return view('admin.contato.index', compact('contato'));
    }

    public function ContatoAdd(){
        $contato = contato::latest()->get();
        return view('admin.contato.create', compact('contato'));
     }


     /**
 * Store a new blog post.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */

     public function ContatoSalvar(Request $request){
   
        //dd($request);

       contato::insert([
           'endereco'   => $request -> endereco,
           'email'      => $request -> email,
           'telefone'   => $request -> telefone,
           'created_at' => Carbon::now()
       ]);
     
       return Redirect()->route('home.contato')->with('success','Contato inserido com sucesso!');
      }

      public function ContatoEdit($id){

        $contato = contato::find($id);
        return view('admin.contato.edit',compact('contato'));
     }

     public function ContatoUpdate(Request $request,$id){
    
            //Atualizar 
           $update = contato::find($id)->update([
                //dd($request),
                'endereco'   => $request -> endereco,
                'email'      => $request -> email,
                'telefone'   => $request -> telefone,
                'updated_at' => Carbon::now()
            ]);
    
            return Redirect()->route('home.contato')->with('success','Contato Atualizado com sucesso!');
           
    }

    public function Delete($id){

        $delete = contato::find($id)->delete();
        return Redirect()->back()->with('success','Contato deletado com sucesso!');
       
    }

    public function Contato(){
        $contato = DB::table('contatos')->first();
        return view('layouts.paginas.contato', compact('contato'));
     }

     public function ContatoForm(Request $request){
        
    //dd($request);

    ContatoForm::insert([
        'nome'       => $request -> nome,
        'email'      => $request -> email,
        'titulo'     => $request -> titulo,
        'mensagem'   => $request -> mensagem,
        'created_at' => Carbon::now()
    ]);

    return Redirect()->route('contato')->with('success','Mensagem enviada  com sucesso!');
     }

     
     public function HomeContatoMensagem(){
        $contato = ContatoForm::All();
        return view('admin.contatomensagem.index', compact('contato'));
    }


}
