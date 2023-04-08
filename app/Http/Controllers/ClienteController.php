<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $cliente = new Cliente();
        $cliente->cedula = $request->input('cedula');
        $cliente->nombre = $request->input('nombre');
        $cliente->apellido = $request->input('apellido');
        $cliente->direccion = $request->input('direccion');
        $cliente->correo_electronico = $request->input('correo_electronico');
        $cliente->eps = $request->input('eps');
        $cliente->telefono = $request->input('telefono');
        $cliente->save();
        
        return redirect()->route('clientes.index')->with('success', 'Cliente creado satisfactoriamente');
    }

    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.show', compact('cliente'));
    }

    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->cedula = $request->input('cedula');
        $cliente->nombre = $request->input('nombre');
        $cliente->apellido = $request->input('apellido');
        $cliente->direccion = $request->input('direccion');
        $cliente->correo_electronico = $request->input('correo_electronico');
        $cliente->eps = $request->input('eps');
        $cliente->telefono = $request->input('telefono');
        $cliente->save();
        return redirect()->route('clientes.index');
    }

    public function destroy($id)
    {
        
        try {
            // Eliminar el cliente y sus registros relacionados en otras tablas
            Cliente::where('id', $id)->delete();
    
            return redirect()->route('clientes.index')->with('success', 'El cliente se eliminó correctamente.');
        } catch(\Illuminate\Database\QueryException $e) {
            // Capturar la excepción de restricción de clave foránea y mostrar una alerta
            return back()->with('error', 'No se puede eliminar este cliente porque tiene registros relacionados en otras tablas.');
        }
    }
}
