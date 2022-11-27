<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portifolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'texto',
        'imagem',
        'link',
    ]; 
}
