<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public function usuarios(){
        //Definimos que un rol tiene muchos usuarios
        return $this->hasMany(Useradmin::class);
    }
}
