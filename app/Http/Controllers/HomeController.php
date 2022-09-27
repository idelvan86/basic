<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Carbon;
use Image;
use Auth;

class HomeController extends Controller
{

    public function HomeSlider(){
        $sliders = Slider::latest()->get();
        return view('admin.slider.index', compact('sliders'));

    }

    public function AddSlider(){
        return view('admin.slider.create');

    }


    public function SalvarSlider(Request $request){
        
      //  $validated = $request->validate([
      //      'marca_nome' => 'required|unique:marcas|min:4',
      //      'marca_imagem' => 'required|mimes:jpg,jpeg,png',
      //  ],
      //  [
      //      'marca_nome.required' => 'Por favor informe a Marca!',
      //      'marca_nome.min' => 'Poucos caracteres na Marca "menos de 4 caracteres"',
      //  ]);

        //---------------------------------------------------------------------------------------------
        //Gerar Nome do Arquivo e informar local onde será salvo!
        // $marca_imagem = $request->file('marca_imagem');
        
        // $gera_nome     = hexdec(uniqid());
        // $imagem_ext    = strtolower($marca_imagem->getClientOriginalExtension());
        // $imagem_nome   =  $gera_nome.'.'.$imagem_ext;
        // $local_salvar  = 'image/marca/';
        // $salvar_imagem = $local_salvar. $imagem_nome;

        // $marca_imagem->move($local_salvar,$imagem_nome);
        //---------------------------------------------------------------------------------------------
        //Gerar Imagem Intervensão editando o tamanho da imagem 

        $slider_imagem = $request->file('imgslider');

        $gera_nome = hexdec(uniqid()).'.'.$slider_imagem->getClientOriginalExtension();
        Image::make($slider_imagem)->resize(1920,1088)->save('image/slider/'.$gera_nome);
        $salvar_imagem = 'image/slider/'.$gera_nome;

        //Salvar 
       Slider::insert([
            'title'         => $request -> titulo,
            'descricao'     => $request -> descricao,
            'imagem'        => $salvar_imagem,
            'created_at'    => Carbon::now()
        ]);
   
        return Redirect()->route('home.slider')->with('success','Slide inserido com sucesso!');


    }



}
