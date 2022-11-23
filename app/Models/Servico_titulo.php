<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico_titulo extends Model
{
    use HasFactory;

    protected $table = "servico_titulo";
    protected $fillable = [
        'id',
        'titulo',
        'titulo_descricao',
    ]; 

}
