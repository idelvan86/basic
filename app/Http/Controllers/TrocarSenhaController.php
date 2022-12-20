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
        //$homeabout = HomeSobre::latest()->get();
        $homeabout = 1;
        return view('admin.mudarsenha.index', compact('homeabout'));
     }
    

     public function UpdateSenha(Request $request){

        $hashedPassword = Auth::user()->password;
       
        if(Hash::check($request->senhaantiga,$hashedPassword)){
            $user = User::find(Auth::id(7));
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::Logout();
            
            return redirect()->route('login')->with('success', 'Senha alterada com sucesso');
        
        }else{

            return redirect()->back()->with('success', 'Senha atual invalida!');

        }

    
    }


}
