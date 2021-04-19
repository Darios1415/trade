<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table="categorias";
    protected $primaryKey = 'idc';
    protected $fillable=['nombre','Descripcion'];

    public function producto(){
        return $this->hasMany('App\Producto');
     }
}
