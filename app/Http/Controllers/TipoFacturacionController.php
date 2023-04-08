<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoFacturacion;

class TipoFacturacionController extends Controller
{
    public function index()
    {
        $tipos_facturacion = TipoFacturacion::all();
        return view('tipo_facturacion.index', compact('tipos_facturacion'));
    }

    public function create()
    {
        return view('tipo_facturacion.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|string|max:100',
        ]);

        TipoFacturacion::create($request->all());
        return redirect()->route('tipo_facturacion.index')->with('success', 'El tipo de facturación ha sido creado exitosamente.');
    }

    public function edit($id)
    {
        $tipo_facturacion = TipoFacturacion::find($id);
        return view('tipo_facturacion.edit', compact('tipo_facturacion'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'descripcion' => 'required|string|max:100',
        ]);

        $tipo_facturacion = TipoFacturacion::find($id);
        $tipo_facturacion->update($request->all());
        return redirect()->route('tipo_facturacion.index')->with('success', 'El tipo de facturación ha sido actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $tipo_facturacion = TipoFacturacion::find($id);
        $tipo_facturacion->delete();
        return redirect()->route('tipo_facturacion.index')->with('success', 'El tipo de facturación ha sido eliminado exitosamente.');
    }
}
