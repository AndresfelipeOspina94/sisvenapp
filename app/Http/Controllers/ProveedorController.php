<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;


class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores=Proveedor::all();
        return view('Proveedor.index', ['proveedores'=>$proveedores]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $proveedores=Proveedor::all();
        return view('Proveedor.new', ['proveedores'=>$proveedores]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'proveedor_nombre' => 'required',
            'proveedor_nombre_contacto' => 'required',
            'proveedor_celular' => 'required',
            'proveedor_email' => 'required',
        ]);

        $proveedores = new Proveedor([
            'proveedor_nombre' => $request->get('proveedor_nombre'),
            'proveedor_nombre_contacto' => $request->get('proveedor_nombre_contacto'),
            'proveedor_celular' => $request->get('proveedor_celular'),
            'proveedor_email' => $request->get('proveedor_email')
        ]);

        $proveedores->save();
    
        return redirect()->route('proveedor.index')->with('success', 'Proveedor creado correctamente');
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
        $proveedores = Proveedor::findOrFail($id);
        return view('proveedor.edit', compact('proveedores'));    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'proveedor_nombre' => 'required',
            'proveedor_nombre_contacto' => 'required',
            'proveedor_celular' => 'required',
            'proveedor_email' => 'required',
        ]);
    
        $proveedores = Proveedor::findOrFail($id);
        $proveedores->proveedor_nombre = $request->proveedor_nombre;
        $proveedores->proveedor_nombre_contacto = $request->proveedor_nombre_contacto;
        $proveedores->proveedor_celular = $request->proveedor_celular;
        $proveedores->proveedor_email = $request->proveedor_email;
        $proveedores->save();
    
        return redirect()->route('proveedor.index')->with('success', 'proveedor actualizado correctamente');  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Proveedor::findOrFail($id)->delete();
            return redirect()->route('proveedor.index')->with('success', 'Proveedor eliminado correctamente');
        } catch (QueryException $e) {
            return redirect()->route('proveedor.index')->with('error', 'No se puede eliminar el proveedor - Intente de nuevo');
        }
    }
}
