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

  return Redirect()->back()->with('success','Sobre inserida com sucesso!');







 }


}
