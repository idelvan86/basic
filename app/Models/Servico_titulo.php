<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico_titulo extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'titulo_descricao',
       
    ]; 


}
