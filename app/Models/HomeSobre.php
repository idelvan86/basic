<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSobre extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'texto_curto',
        'texto_longo',
        
    ]; 




}
