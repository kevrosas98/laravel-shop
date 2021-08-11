<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    
    public $timestamps = false;

    public function categoria(){
        //un producto pertenece a una categoría
        return $this->belongsTo(Categoria::class);
    }
}
