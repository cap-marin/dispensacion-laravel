@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <h1>Editar Producto</h1>
@stop

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('productos.update', $producto->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre_producto">Nombre del Producto:</label>
                <input type="text" class="form-control @error('nombre_producto') is-invalid @enderror" id="nombre_producto"
                    name="nombre_producto" value="{{ old('nombre_producto', $producto->nombre_producto) }}">
                @error('nombre_producto')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="number" step="0.01" class="form-control @error('precio') is-invalid @enderror"
                    id="precio" name="precio" value="{{ old('precio', $producto->precio) }}">
                @error('precio')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="lote">Lote:</label>
                <input type="text" class="form-control @error('lote') is-invalid @enderror" id="lote" name="lote"
                    value="{{ old('lote', $producto->lote) }}">
                @error('lote')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="vencimiento">Fecha de Vencimiento:</label>
                <input type="date" class="form-control @error('vencimiento') is-invalid @enderror" id="vencimiento"
                    name="vencimiento" value="{{ old('vencimiento', $producto->vencimiento) }}">
                @error('vencimiento')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="estado">Estado:</label>
                <select class="form-control @error('estado') is-invalid @enderror" id="estado" name="estado">
                    <option value="activo" @if ($producto->estado == 'activo') selected @endif>Activo</option>
                    <option value="inactivo" @if ($producto->estado == 'inactivo') selected @endif>Inactivo</option>
                </select>
                @error('estado')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mr-2">Guardar Cambios</button>
            <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
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
