<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'proveedores';
    protected $primaryKey = 'proveedor_id';

    protected $fillable = [
        'proveedor_nombre',
        'proveedor_nombre_contacto',
        'proveedor_celular',
        'proveedor_email',
    ];
}
