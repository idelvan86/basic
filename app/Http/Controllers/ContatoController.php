<?php

namespace App\Http\Controllers;
use App\Models\contato;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

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

        /*$validated = $request->validate([
           'endereco' => 'required',
           'email' => 'required',
           'telefone' => 'required',
       ],
       [
           'endereco.required' => 'Por favor informe o endereço!',
           'email.required' => 'Por favor informe o e-mail!',
           'telefone.required' => 'Por favor informe o telefone!',
           
       ]); 
       */
       //---------------------------------------------------------------------------------------------
     
       //Salvar 
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
     
}
