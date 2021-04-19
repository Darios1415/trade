<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class Producto extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table ='productos';
    protected $primaryKey = 'idpr';
    protected $fillable=['nombre', 'existencia', 'descripcion', 'precio', 'img', 'idc',];

    public function categoria(){
        return $this->belongsTo('App\Categoria', 'idc');
    }
}
