<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'card_icone',
        'card_titulo',
        'card_descricao',
        
    ]; 


}
