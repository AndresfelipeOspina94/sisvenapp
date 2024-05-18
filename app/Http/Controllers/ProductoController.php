<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::with('categoria', 'proveedor')->get();
        return view('producto.index', ['productos' => $productos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        $proveedores = Proveedor::all();
        return view('producto.new', compact('categorias', 'proveedores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'producto_name' => 'required',
            'categoria_id' => 'required|exists:categorias,categoria_id',
            'proveedor_id' => 'required|exists:proveedores,proveedor_id',
            'precio_producto' => 'required|numeric',
            'cantidad_stock' => 'required|integer',
        ]);

        try {
            $producto = new Producto([
                'producto_name' => $request->get('producto_name'),
                'categoria_id' => $request->get('categoria_id'),
                'proveedor_id' => $request->get('proveedor_id'),
                'precio_producto' => $request->get('precio_producto'),
                'cantidad_stock' => $request->get('cantidad_stock'),
            ]);

            $producto->save();
            return redirect()->route('producto.index')->with('success', 'Producto creado correctamente');
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->back()->withInput()->withErrors(['error' => 'No se pudo guardar el producto.']);
        }
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
        $producto = Producto::findOrFail($id);
        $categorias = Categoria::all();
        $proveedores = Proveedor::all();
        return view('producto.edit', compact('producto', 'categorias', 'proveedores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'producto_name' => 'required',
            'categoria_id' => 'required|exists:categorias,categoria_id',
            'proveedor_id' => 'required|exists:proveedores,proveedor_id',
            'precio_producto' => 'required|numeric',
            'cantidad_stock' => 'required|integer',
        ]);

        try {
            $producto = Producto::findOrFail($id);
            $producto->producto_name = $request->producto_name;
            $producto->categoria_id = $request->categoria_id;
            $producto->proveedor_id = $request->proveedor_id;
            $producto->precio_producto = $request->precio_producto;
            $producto->cantidad_stock = $request->cantidad_stock;
            $producto->save();

            return redirect()->route('producto.index')->with('success', 'Producto actualizado correctamente');
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->back()->withInput()->withErrors(['error' => 'No se pudo actualizar el producto.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Producto::findOrFail($id)->delete();
            return redirect()->route('producto.index')->with('success', 'Producto eliminado correctamente');
        } catch (QueryException $e) {
            return redirect()->route('producto.index')->with('error', 'No se puede eliminar el producto porque está asociado a otros registros.');
        }
    }
}
