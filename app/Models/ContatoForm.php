<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContatoForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'titulo',
        'mensagem',
    ]; 
    
}
