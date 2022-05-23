<?php

namespace App\Http\Controllers;
use App\Models\Marca;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


class MarcaController extends Controller
{
    public function Allmarca(){
   
        $marca = Marca::latest()->paginate(5);
        return view('admin.marca.index' , compact('marca'));
   
    }

    public function Createmarca(){

   
    }

}
