<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\Homesobre;


class SobreController extends Controller
{
 
public function HomeAbout(){
    $homeabout = HomeSobre::latest()->get();
    return view('admin.sobre.index', compact('homeabout'));
 }

 public function HomeAdd(){
    $homeabout = HomeSobre::latest()->get();
    return view('admin.sobre.create', compact('homeabout'));
 }

 public function HomeSalvar(Request $request){
   

   $validated = $request->validate([
      'titulo' => 'required',
      'texto_curto' => 'required',
      'texto_longo' => 'required',
  ],
  [
      'titulo.required' => 'Por favor informe o Titulo!',
      'texto_curto.required' => 'Por favor informe o texto curto!',
      'texto_longo.required' => 'Por favor informe o texto longo !',
      
  ]);
  //---------------------------------------------------------------------------------------------

  //Salvar 
  HomeSobre::insert([
      'titulo'      => $request -> titulo,
      'texto_curto' => $request -> texto_curto,
      'texto_longo' => $request -> texto_longo,
      'created_at'  => Carbon::now()
  ]);

  return Redirect()->route('home.sobre')->with('success','Sobre inserido com sucesso!');
 }


 public function HomeEdit($id){

    $homeabout = HomeSobre::find($id);
    return view('admin.sobre.edit',compact('homeabout'));
 }


 public function UpdateHome(Request $request,$id){

    /*
    $validated = $request->validate([
        'marca_nome' => 'required|min:4',
        
    ],
    [
        'marca_nome.required' => 'Por favor informe a Marca!',
        'marca_imagem.min' => 'Poucos caracteres na Marca "menos de 4 caracteres"',
    ]);
*/

        //Atualizar 
       $update = HomeSobre::find($id)->update([
            //dd($request),
            'titulo'      =>  $request -> titulo,
            'texto_curto' =>  $request -> texto_curto,
            'texto_longo' =>  $request -> texto_longo,
            'updated_at'  =>  Carbon::now()
        ]);

        return Redirect()->route('home.sobre')->with('success','Sobre Atualizada com sucesso!');


}


}
