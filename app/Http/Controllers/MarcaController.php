<?php

namespace App\Http\Controllers;
use App\Models\Marca;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Image;


class MarcaController extends Controller
{
    public function AllMarca(){
        // Teste de Conexão com dois bancos de dados
        //$marca = DB::connection('mysql2')->select('SELECT * FROM noticias');

        $marca = Marca::latest()->paginate(5);
        return view('admin.marca.index' , compact('marca'));
   
    }

    public function Addmarca(Request $request){

        $validated = $request->validate([
            'marca_nome' => 'required|unique:marcas|min:4',
            'marca_imagem' => 'required|mimes:jpg,jpeg,png',
        ],
        [
            'marca_nome.required' => 'Por favor informe a Marca!',
            'marca_nome.min' => 'Poucos caracteres na Marca "menos de 4 caracteres"',
        ]);

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

        $marca_imagem = $request->file('marca_imagem');

        $gera_nome = hexdec(uniqid()).'.'.$marca_imagem->getClientOriginalExtension();
        Image::make($marca_imagem)->resize(100,100)->save('image/marca/'.$gera_nome);
        $salvar_imagem = 'image/marca/'.$gera_nome;

        //---------------------------------------------------------------------------------------------

        //Salvar 
        Marca::insert([
            'marca_nome'    => $request -> marca_nome,
            'marca_imagem'  => $salvar_imagem,
            'created_at'    => Carbon::now()
        ]);
   
        return Redirect()->back()->with('success','Marca inserida com sucesso!');

    }

    public function EditMarca($id){
        $marcas = Marca::find($id);

        return view('admin.marca.edit',compact('marcas'));
    }

    public function Update(Request $request,$id){

        $validated = $request->validate([
            'marca_nome' => 'required|min:4',
            
        ],
        [
            'marca_nome.required' => 'Por favor informe a Marca!',
            'marca_imagem.min' => 'Poucos caracteres na Marca "menos de 4 caracteres"',
        ]);

        //Pegar Endereço da Imagem antiga
        $antiga_imagem = $request-> antiga_imagem;

        //Gerar Nome do Arquivo e informar local onde será salvo!
        $marca_imagem = $request->file('marca_imagem');
        

        if( $marca_imagem){

            $gera_nome     = hexdec(uniqid());
            $imagem_ext    = strtolower($marca_imagem->getClientOriginalExtension());
            $imagem_nome   =  $gera_nome.'.'.$imagem_ext;
            $local_salvar  = 'image/marca/';
            $salvar_imagem = $local_salvar. $imagem_nome;

            $marca_imagem->move($local_salvar,$imagem_nome);
            
            unlink($antiga_imagem);
            //Atualizar 
            Marca::find($id)->update([
                'marca_nome' => $request -> marca_nome,
                'marca_imagem' =>  $salvar_imagem,
                'updated_at'    => Carbon::now()
            ]);

            return Redirect()->back()->with('success','Marca Atualizada com sucesso!');

        }

        else{

            Marca::find($id)->update([
                'marca_nome' => $request -> marca_nome,
                'updated_at'    => Carbon::now()
            ]);

          return Redirect()->back()->with('success','Marca Atualizada com sucesso!');
    
        }

    }

    public function Delete($id){

        $imagem = Marca::find($id);
        $atual_imagem = $imagem-> marca_imagem;
        unlink($atual_imagem);
        
        Marca::find($id)->delete();

        return Redirect()->back()->with('success','Marca Deletada com sucesso!');
       
    }



}
