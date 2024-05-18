<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MetodoPago extends Model
{
    protected $table = 'metodos_pagos';
    protected $primaryKey = 'metodo_pago_id';
    public $timestamps = false;

    protected $fillable = ['metodo_pago_nombre', 'metodo_pago_observacion'];


}
