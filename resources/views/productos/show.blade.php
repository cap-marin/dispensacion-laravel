@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <h1>Detalle de Producto</h1>
@stop

@section('content')
<div class="container">
    <hr>
    <div class="row">
        <div class="col-sm-6">
            <p><strong>Nombre:</strong> {{ $producto->nombre_producto }}</p>
            <p><strong>Precio:</strong> {{ $producto->precio }}</p>
            <p><strong>Lote:</strong> {{ $producto->lote }}</p>
            <p><strong>Vencimiento:</strong> {{ $producto->vencimiento }}</p>
            <p><strong>Estado:</strong> {{ $producto->estado }}</p>
            <p><strong>Fecha de creación:</strong> {{ $producto->fecha_creacion }}</p>
        </div>
    </div>
</div>
<a href="{{ route('productos.index') }}" class="btn btn-secondary">Volver</a>
@stop

