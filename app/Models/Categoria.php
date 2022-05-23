<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  Illuminate\Database\Eloquent\SoftDeletes;

class categoria extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'id_usuario',
        'categoria_nome',
    ]; 

    public function user(){
      return $this->hasOne(User::class,'id','id_usuario');
    }



}
