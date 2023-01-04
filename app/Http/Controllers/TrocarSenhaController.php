<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Image;

class TrocarSenhaController extends Controller
{
    
    public function TrocarSenha(){
        
        return view('admin.mudarsenha.index');
     }
    

     public function UpdateSenha(Request $request){

        $validated = $request->validate([
            'senhaantiga' => 'required',
            'senha' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
       
        if(Hash::check($request->senhaantiga,$hashedPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->senha);
            $user->save();
            Auth::logout();
            
            return redirect()->route('login')->with('success', 'Senha alterada com sucesso');
        
        }else{

            return redirect()->back()->with('success', 'Senha atual invalida!');

        }

    
    }

    public function PerfilUpdate(){

        if(Auth::user()){
            $user = User::find(Auth::user()->id);
            if($user){
                return view('admin.atualizar_perfil.index',compact('user'));    
             }
        }
     }


     public function UpdateUsuario(Request $request){

            $user = User::find(Auth::user()->id);
            if($user){


                $user->name  = $request['nome'];
                $user->email = $request['email'];

               

                $marca_imagem = $request->file('imagem');   

                if( $marca_imagem){
    
                    $gera_nome     = hexdec(uniqid());
                    $imagem_ext    = strtolower($marca_imagem->getClientOriginalExtension());
                    $imagem_nome   =  $gera_nome.'.'.$imagem_ext;
                    $local_salvar  = 'image/perfil/';
                    $salvar_imagem = $local_salvar. $imagem_nome;
        
                    $marca_imagem->move($local_salvar,$imagem_nome);
                    
                    unlink($antiga_imagem);
                    //Atualizar 
                    User::find(Auth::id())->update([
                        'profile_photo_path	' =>  $salvar_imagem,
                        'updated_at'    => Carbon::now()
                    ]);            
                
                    $user->save();

                return redirect()->back()->with('success', 'Perfil de Usuario altualizado com sucesso');

            }else{

                return redirect()->back();

            }
                
    }

}
}