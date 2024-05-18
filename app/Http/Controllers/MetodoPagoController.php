<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MetodoPago;
use Illuminate\Database\QueryException;

class MetodoPagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $metodos_pagos = MetodoPago::all();
        return view('metodo_pago.index', ['metodos_pagos' => $metodos_pagos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('metodo_pago.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Metodo_Pago_Nombre' => 'required',
            'Metodo_Pago_Observacion' => 'required',
        ]);


        $metodo_pago = new MetodoPago([
            'Metodo_Pago_Nombre' => $request->get('Metodo_Pago_Nombre'),
            'Metodo_Pago_Observacion' => $request->get('Metodo_Pago_Observacion'),
        ]);

        $metodo_pago->save();
    
        return redirect()->route('metodo_pago.index')->with('success', 'Metodo de pago creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $metodos_pagos = MetodoPago::findOrFail($id);
        return view('metodo_pago.edit', compact('metodos_pagos'));  
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'Metodo_Pago_Nombre' => 'required',
            'Metodo_Pago_Observacion' => 'required',
        ]);
    
        $metodos_pagos = MetodoPago::findOrFail($id);
        $metodos_pagos->metodo_pago_nombre = $request->metodo_pago_nombre;
        $metodos_pagos->metodo_pago_observacion = $request->metodo_pago_observacion;
        $metodos_pagos->save();
    
        return redirect()->route('metodo_pago.index')->with('success', 'Metodo de pago actualizado correctamente'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // Cargar el registro antes de eliminar
                MetodoPago::findOrFail($id)->delete();
                return redirect()->route('metodo_pago.index')->with('success', 'Producto eliminado correctamente');

        } catch (QueryException $e) {
            return redirect()->route('metodo_pago.index')->with('error', 'No se puede eliminar el metodo de pago - Intente de nuevo');
        }
    }
}