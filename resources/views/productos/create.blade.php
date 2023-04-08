@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <h1>Nuevo Producto</h1>
@stop

@section('content')
<div class="container">
    <h1>Nuevo producto</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('productos.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nombre_producto">Nombre del producto</label>
            <input type="text" name="nombre_producto" id="nombre_producto" class="form-control" value="{{ old('nombre_producto') }}" required>
        </div>

        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" name="precio" id="precio" class="form-control" value="{{ old('precio') }}" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="lote">Lote</label>
            <input type="text" name="lote" id="lote" class="form-control" value="{{ old('lote') }}" required>
        </div>

        <div class="form-group">
            <label for="vencimiento">Fecha de vencimiento</label>
            <input type="date" name="vencimiento" id="vencimiento" class="form-control" value="{{ old('vencimiento') }}" required>
        </div>

        <div class="form-group">
            <label for="estado">Estado</label>
            <select name="estado" id="estado" class="form-control" required>
                <option value="activo">Activo</option>
                <option value="inactivo">Inactivo</option>
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('productos.index') }}" class="btn btn-link">Cancelar</a>
        </div>
    </form>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

