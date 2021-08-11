<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function venta_productos(){
        //Definimos que una venta tiene muchos productos
        return $this->hasMany(VentaProducto::class);
    }

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
}
