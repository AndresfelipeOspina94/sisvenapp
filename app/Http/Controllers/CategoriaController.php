<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::all();
        return view('categoria.index', ['categorias' => $categorias]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categoria.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'categoria_nombre' => 'required',
            'categoria_descripcion' => 'required',
        ]);

        try {
            $categoria = new Categoria([
                'categoria_nombre' => $request->get('categoria_nombre'),
                'categoria_descripcion' => $request->get('categoria_descripcion'),
            ]);

            $categoria->save();
            return redirect()->route('categoria.index')->with('success', 'Categoría creada correctamente');
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->back()->withInput()->withErrors(['error' => 'No se pudo guardar la categoría.']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('categoria.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'categoria_nombre' => 'required',
            'categoria_descripcion' => 'required',
        ]);

        try {
            $categoria = Categoria::findOrFail($id);
            $categoria->categoria_nombre = $request->categoria_nombre;
            $categoria->categoria_descripcion = $request->categoria_descripcion;
            $categoria->save();

            return redirect()->route('categoria.index')->with('success', 'Categoría actualizada correctamente');
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->back()->withInput()->withErrors(['error' => 'No se pudo actualizar la categoría.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Categoria::findOrFail($id)->delete();
            return redirect()->route('categoria.index')->with('success', 'Categoría eliminada correctamente');
        } catch (QueryException $e) {
            return redirect()->route('categoria.index')->with('error', 'No se puede eliminar la categoría porque está asociada a otros registros.');
        }
    }
}
