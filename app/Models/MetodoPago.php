<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetodoPago extends Model
{
    use HasFactory;

    protected $table = 'metodos_pagos';
    protected $primaryKey = 'metodo_pago_id';

    protected $fillable = [
        'metodo_pago_nombre',
        'metodo_pago_observacion',
    ];
}
