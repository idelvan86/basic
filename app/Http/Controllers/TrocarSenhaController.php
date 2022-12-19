<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Carbon;

class TrocarSenhaController extends Controller
{
    
    public function TrocarSenha(){
        //$homeabout = HomeSobre::latest()->get();
        $homeabout = 1;
        return view('admin.mudarsenha.index', compact('homeabout'));
     }
    

     public function UpdateSenha(Request $request,$id){

        
        $validated = $request->validate([
            'marca_nome' => 'required|min:4',
            
        ],
        [
            'marca_nome.required' => 'Por favor informe a Marca!',
            'marca_imagem.min' => 'Poucos caracteres na Marca "menos de 4 caracteres"',
        ]);
        
            //Atualizar 
           $update = User::find($id)->update([
                //dd($request),
                'password'      =>  $request -> password,
                
                'updated_at'  =>  Carbon::now()
            ]);
    
            return Redirect()->route('home.sobre')->with('success','Sobre Atualizada com sucesso!');
    
    
    }


}
