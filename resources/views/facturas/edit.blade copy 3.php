@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="container">
    <h1>Editar Factura</h1>
    <form method="POST" action="{{ route('facturas.update', $factura->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="fecha">Fecha:</label>
            <input type="date" class="form-control" id="fecha" name="fecha" value="{{ date('Y-m-d', strtotime($factura->fecha_venta)) }}">
        </div>
        <div class="form-group">
            <label for="cliente_id">Cliente:</label>
            <select class="form-control" id="cliente_id" name="cliente_id">
                @foreach ($clientes as $cliente)
                <option value="{{ $cliente->id }}" {{ $cliente->id == $factura->cliente_id ? 'selected' : '' }}>
                    {{ $cliente->nombre }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tipo_facturacion_id">Tipo de Facturación:</label>
            <select class="form-control" id="tipo_facturacion_id" name="tipo_facturacion_id">
                @foreach ($tipos_facturacion as $tipoFacturacion)
                <option value="{{ $tipoFacturacion->id }}" {{ $tipoFacturacion->id == $factura->id_tipo_facturacion ? 'selected' : '' }}>
                    {{ $tipoFacturacion->descripcion }}
                </option>
                @endforeach
            </select>
        </div>
        @foreach ($factuLinea as $factuLinea)
        <div class="form-group">
            <label for="producto_id">Producto:</label>
            <select class="form-control" id="producto_id" name="producto_id">
                @foreach ($productos as $producto)
                <option value="{{ $producto->id }}">
                    {{ $producto->nombre_producto }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="cantidad">Cantidad:</label>
            <input type="number" class="form-control" id="cantidad" name="cantidad" value="{{ old('cantidad') }}">
        </div>
        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="number" class="form-control" id="precio" name="precio" value="{{ old('precio') }}">
        </div>
        @endforeach
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('facturas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop