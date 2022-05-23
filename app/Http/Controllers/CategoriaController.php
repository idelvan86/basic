<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class categoriaController extends Controller
{
    public function AllCat(){
        //Pegar todos os dados
        //$categorias = categoria::all();
        
        //ordem decrescente
        //$categorias = categoria::latest()->get();
        
        $categorias = categoria::latest()->paginate(5);
        $trashCat = Categoria::onlyTrashed()->latest()->paginate(3);

        //query Builder - latest() = Ordem decrescente; paginate() = quebrar a lista em paginas
        //$categorias = DB::table('categorias')->latest()->paginate(5);

        //Relação duas tabelas com query builder
        //$categorias = DB::table('categorias')
        //->join('users','categorias.id_usuario','users.id')
        //->select('categorias.*','users.name')
        //->latest()->paginate(5);

        return view('admin.categorias.index', compact('categorias','trashCat'));
    }

    public function AddCat(Request $request){
        
        $validated = $request->validate([
            'categoria_nome' => 'required|unique:categorias|max:10'
        ],
        [
            'categoria_nome.required' => 'Por favor informe a categoria!',
            'categoria_nome.max' => 'Muitos caracteres em categoria',
        ]);

    //  -1º Forma de salvas os dados   
        Categoria::insert([
            'categoria_nome' => $request -> categoria_nome,
            'id_usuario'  => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);

    //   -2º Forma de salvar os dados 
    //   $categoria = new categoria;
    //   $categoria-> categoria_nome = $request-> categoria_nome;
    //   $categoria-> id_usuario = Auth::user()->id;
    //   $categoria-> save();


    //  -Salvar com Query Builder 
    //    $data = array();
    //    $data ['categoria_nome'] = $request -> categoria_nome;
    //    $data ['id_usuario'] = Auth::user()->id;
    //    DB::table('categorias')->insert($data);

        return Redirect()->back()->with('success','Categoria inserida com sucesso!');

    }

    public function Edit($id) {
        $categorias = Categoria::find($id);
        //query builder
        $categoria = DB::table('categorias')->where('id' , $id )->first();

        return view('admin.categorias.edit',compact('categorias'));

    }

   /* public function Update(Request $request , $id) {
       
        $categorias = Categoria::find($id)->update([
       
            'categoria_nome' => $request->categoria_nome,
            'id_usuario'  => Auth::user()->id

        ]);

        return Redirect()->route('all.categorias')->with('success','Categoria atualizada com sucesso!');

    }
   */

   //----------Query Builder
     public function Update(Request $request , $id) {
       
        $data = array();
        $data['categoria_nome'] = $request->categoria_nome;
        $data['id_usuario'] = Auth::user()->id;
        DB::table('categorias')-where('id', $id)->update($data);

        return Redirect()->route('all.categorias')->with('success','Categoria atualizada com sucesso!');
   
    }

    public function SoftDelete($id) {

        $delete = Categoria::find($id)->delete();

        return Redirect()->back()->with('success','Categoria Deletada com Sucesso');

    }

    public function Restaurardado($id) {

        $delete = Categoria::withTrashed()->find($id)->restore();

        return Redirect()->back()->with('success','Categoria Restaurada com Sucesso');

    }

    public function Apagarpermanente($id) {

        $delete = Categoria::onlyTrashed()->find($id)->forceDelete();

        return Redirect()->back()->with('success','Categoria Apagada permanentemente com Sucesso');

    }

}