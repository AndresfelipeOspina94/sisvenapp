<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedores';
    protected $primaryKey = 'proveedor_id';
    public $timestamps = false;
    protected $fillable = ['proveedor_nombre', 'proveedor_nombre_contacto', 'proveedor_celular', 'proveedor_email'];

    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}
