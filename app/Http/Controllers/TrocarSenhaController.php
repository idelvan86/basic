<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrocarSenhaController extends Controller
{
    
    public function TrocarSenha(){
        //$homeabout = HomeSobre::latest()->get();
        $homeabout = 1;
        return view('admin.mudarsenha.index', compact('homeabout'));
     }
    


}
