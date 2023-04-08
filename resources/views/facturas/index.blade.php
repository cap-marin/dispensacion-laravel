@extends('adminlte::page')

@section('title', 'Facturas')

@section('content_header')
    <h1>Lista de facturas</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <a class="btn btn-success mb-2" href="{{ route('facturas.create') }}">Nueva Factura</a>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Usuario</th>
                                    <th>Cliente</th>
                                    <th>Fecha de venta</th>
                                    <th>Tipo de facturación</th>
                                    <th>Subtotal</th>
                                    <th>Descuento</th>
                                    <th>Total</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($facturas as $factura)
                                    <tr>
                                        <td>{{ $factura->id }}</td>
                                        <td>{{ $factura->user->name }}</td>
                                        <td>{{ $factura->cliente->nombre }}</td>
                                        <td>{{ $factura->fecha_venta }}</td>
                                        <td>{{ $factura->tipoFacturacion->descripcion }}</td>
                                        <td>{{ $factura->subtotal }}</td>
                                        <td>{{ $factura->descuento }}</td>
                                        <td>{{ $factura->total }}</td>
                                        <td>
                                            <a href="{{ route('facturas.show', ['factura' => $factura->id]) }}"
                                                class="btn btn-sm btn-info">Ver</a>
                                            <a href="{{ route('facturas.edit', ['factura' => $factura->id]) }}"
                                                class="btn btn-sm btn-warning">Editar</a>
                                            <form action="{{ route('facturas.destroy', ['factura' => $factura->id]) }}"
                                                method="POST" style="display: inline-block;">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('¿Está seguro de que desea eliminar esta factura?')">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
