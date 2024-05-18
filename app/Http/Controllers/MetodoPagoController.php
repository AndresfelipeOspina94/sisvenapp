<?php

namespace App\Http\Controllers;

use App\Models\MetodoPago;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class MetodoPagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
            'metodo_pago_nombre' => 'required',
            'metodo_pago_observacion' => 'required',
        ]);

        try {
            $metodo_pago = new MetodoPago([
                'metodo_pago_nombre' => $request->get('metodo_pago_nombre'),
                'metodo_pago_observacion' => $request->get('metodo_pago_observacion'),
            ]);

            $metodo_pago->save();
            return redirect()->route('metodo_pago.index')->with('success', 'Método de Pago creado correctamente');
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->back()->withInput()->withErrors(['error' => 'No se pudo guardar el Método de Pago.']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $metodo_pago = MetodoPago::findOrFail($id);
        return view('metodo_pago.edit', compact('metodo_pago'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'metodo_pago_nombre' => 'required',
            'metodo_pago_observacion' => 'required',
        ]);

        try {
            $metodo_pago = MetodoPago::findOrFail($id);
            $metodo_pago->metodo_pago_nombre = $request->metodo_pago_nombre;
            $metodo_pago->metodo_pago_observacion = $request->metodo_pago_observacion;
            $metodo_pago->save();

            return redirect()->route('metodo_pago.index')->with('success', 'Método de Pago actualizado correctamente');
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->back()->withInput()->withErrors(['error' => 'No se pudo actualizar el Método de Pago.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            MetodoPago::findOrFail($id)->delete();
            return redirect()->route('metodo_pago.index')->with('success', 'Método de Pago eliminado correctamente');
        } catch (QueryException $e) {
            return redirect()->route('metodo_pago.index')->with('error', 'No se puede eliminar el Método de Pago porque está asociado a otros registros.');
        }
    }
}
