<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = ['producto_name', 'categoria_id', 'proveedor_id', 'precio_producto', 'cantidad_stock'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id', 'categoria_Id');
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'proveedor_id', 'proveedor_id');
    }
}