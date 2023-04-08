@extends('adminlte::page')

@section('title', 'Factura')

@section('content_header')
    <h1>Detalle Factura</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    
                    <div class="panel-body">
                        <p><strong>Número de factura:</strong> Factura {{ $factura->id }}</p>
                        <p><strong>Fecha de emisión:</strong> {{ $factura->fecha_venta }}</p>
                        <p><strong>Total:</strong> {{ $factura->total }}</p>
                        <p><strong>Cliente:</strong> {{ $factura->cliente->nombre }}</p>
                        <p><strong>Productos:</strong></p>
                        <ul>
                            @foreach ($factuLinea as $producto)
                            
                                <li><strong>Código:</strong> {{ $producto->id_producto }} - <strong>Precio:</strong> {{ $producto->precio }}</li>
                            
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
