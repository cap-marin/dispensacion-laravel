<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre_producto' => 'required|max:100',
            'precio' => 'required|numeric',
            'lote' => 'required|max:50',
            'vencimiento' => 'required|date',
            'estado' => 'required|in:activo,inactivo'
        ]);

        Producto::create($validated);

        return redirect()->route('productos.index')->with('success', 'Producto creado satisfactoriamente');
    }

    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.show', compact('producto'));
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nombre_producto' => 'required|max:100',
            'precio' => 'required|numeric',
            'lote' => 'required|max:50',
            'vencimiento' => 'required|date',
            'estado' => 'required|in:activo,inactivo'
        ]);

        $producto = Producto::findOrFail($id);
        $producto->update($validated);

        return redirect()->route('productos.index')->with('success', 'Producto actualizado satisfactoriamente');
    }

    public function destroy($id)
    {
        
        try {
            // Eliminar el cliente y sus registros relacionados en otras tablas
            Producto::where('id', $id)->delete();
    
            return redirect()->route('productos.index')->with('success', 'Producto eliminado satisfactoriamente');
        } catch(\Illuminate\Database\QueryException $e) {
            // Capturar la excepción de restricción de clave foránea y mostrar una alerta
            return back()->with('error', 'No se puede eliminar este cliente porque tiene registros relacionados en otras tablas.');
        }
    }
}
