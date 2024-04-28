<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';
    protected $primaryKey = 'categoria_Id';
    public $timestamps = false;
    protected $fillable = ['categoria_nombre', 'categoria_descripcion'];

    public function productos()
    {
        return $this->hasMany(Producto::class, 'categoria_id');
    }
}
