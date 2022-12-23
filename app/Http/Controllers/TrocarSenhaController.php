<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

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












    


}