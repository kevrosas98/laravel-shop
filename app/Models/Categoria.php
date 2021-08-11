<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function productos(){
        //Definimos que una categoría tiene muchos productos
        return $this->hasMany(Producto::class);
    }
}
