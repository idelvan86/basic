<?php

namespace App\Http\Controllers;
use App\Models\contato;
use Illuminate\Http\Request;

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

    
}
