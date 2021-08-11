<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VentaProducto extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function producto(){
        //un detalle pertenece a un producto
        return $this->belongsTo(Producto::class);
    }

}
