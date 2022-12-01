<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function HomeContato(){
     
        //$sliders = Slider::latest()->get();
        return view('admin.contato.index');

    }
}
