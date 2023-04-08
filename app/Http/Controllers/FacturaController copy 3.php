<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Factulinea;
use App\Models\Factura;
use App\Models\Producto;
use App\Models\TipoFacturacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

ini_set('memory_limit', '2G'); // aumentar el límite de memoria a 1 GB

class FacturaController extends Controller
{

    public function index()
    {
        $facturas = Factura::all();
        return view('facturas.index', compact('facturas'));
    }
    public function create()
    {
        $clientes = Cliente::all();
        $productos = Producto::all();
        $tipoFacturacion = TipoFacturacion::all();

        return view('facturas.create', compact('clientes', 'productos', 'tipoFacturacion'));
    }

    public function store(Request $request)
    {
        /*
        $factura = new Factura;
        $factura->fecha = $request->fecha;
        $factura->cliente_id = $request->cliente_id;
        $factura->tipo_facturacion_id = $request->tipo_facturacion_id;
        $factura->save();

        foreach ($request->producto_id as $key => $producto_id) {
            $facturaLinea = new Factulinea();
            $facturaLinea->factura_id = $factura->id;
            $facturaLinea->producto_id = $producto_id;
            $facturaLinea->cantidad = $request->cantidad[$key];
            $facturaLinea->precio = $request->precio[$key];
            $facturaLinea->save();
        }

        return redirect()->route('facturas.index');*/

        $usuario_id = Auth::user()->id;

        echo "request";
        //var_dump($request->cliente_id);die();
        $factura = new Factura;
        $factura->id_cliente = $request->cliente_id;
        $factura->fecha_venta = now(); //date('Y-m-d');
        $factura->id_tipo_facturacion = $request->tipo_facturacion;
        //$factura->observacion = $request->observacion;
        $factura->id_usuario = $usuario_id;
        $factura->total = $request->total;
        $factura->save();

        $factura_id = $factura->id;

        $productos = $request->producto_id;
        foreach ($productos as $producto) {
            //print_r($producto);die();
            $producto_id = $producto;
            //$cantidad = $producto['cantidad'];
            //$lote = $producto['lote'];
            //$vencimiento = $producto['vencimiento'];

            //$vencimiento = $producto['vencimiento'];
            $producto = Producto::find($producto_id);

            $facturaLinea = new FactuLinea;
            $facturaLinea->id_formula = $factura_id;
            $facturaLinea->id_producto = $producto_id;
            $facturaLinea->cantidad = 1; //$request->cantidad;
            $facturaLinea->precio = $producto->precio;
            $facturaLinea->total_linea = 1000;
            $facturaLinea->save();
        }
        //dd($producto);
        //print_r($producto);die();
        return redirect()->route('facturas.index');
    }


    public function edit($id)
    {
        $factura = Factura::findOrFail($id);
        $clientes = Cliente::all();
        $tipos_facturacion = TipoFacturacion::all();
        $productos = Producto::all();
        $factuLinea = FactuLinea::where('id_factura', $factura->id_formula)->first();
        //dd($factura);

        return view('facturas.edit', compact('factura', 'clientes', 'tipos_facturacion', 'productos', 'factuLinea'));
    }

    public function update(Request $request, $id)
    {
        $factura = Factura::findOrFail($id);
        $factura->fecha_venta = $request->fecha;
        $factura->id_cliente = $request->cliente_id;
        $factura->id_tipo_facturacion = $request->tipo_facturacion_id;
        $factura->save();

        $facturaLinea = FactuLinea::where('id_factura', $factura->id_formula)->first();
        $facturaLinea->id_producto = $request->producto_id;
        $facturaLinea->cantidad = $request->cantidad;
        $facturaLinea->precio = $request->precio;
        $facturaLinea->save();

        return redirect()->route('facturas.index');
    }

    public function destroy(Factura $factura)
    {
        $factura->delete();

        return redirect()->route('facturas.index');
    }

    public function getPrecioProducto(Request $request)
    {
        echo "hola" . $request->input('producto_id');
        die();
        $producto = Producto::find($request->input('producto_id'));
        return response()->json(['precio' => $producto->precio]);
    }
}
