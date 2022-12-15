<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrocarSenhaController extends Controller
{
    
    public function TrocarSenha(){
        //$homeabout = HomeSobre::latest()->get();
        return view('admin.sobre.index', compact('homeabout'));
     }
    


}
