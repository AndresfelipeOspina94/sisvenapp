<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MetodoPago extends Model
{
    protected $table = 'Metodos_Pagos';
    protected $primaryKey = 'Metodo_Pago_Id';
    public $timestamps = false;

    protected $fillable = ['Metodo_Pago_Nombre', 'Metodo_Pago_Observacion'];


}
