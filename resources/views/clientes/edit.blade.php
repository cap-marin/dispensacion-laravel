@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1>Editar Cliente</h1>
@stop

@section('content')
    <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Cédula:</label>
            <input type="text" class="form-control" id="cedula" name="cedula" value="{{ $cliente->cedula }}" required>
        </div>
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $cliente->nombre }}" required>
        </div>
        <div class="form-group">
            <label for="apellido">Apellido:</label>
            <input type="text" class="form-control" id="apellido" name="apellido" value="{{ $cliente->apellido }}"
                required>
        </div>
        <div class="form-group">
            <label for="direccion">Dirección:</label>
            <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $cliente->direccion }}"
                required>
        </div>
        <div class="form-group">
            <label for="correo_electronico">Correo Electrónico:</label>
            <input type="email" class="form-control" id="correo_electronico" name="correo_electronico"
                value="{{ $cliente->correo_electronico }}" required>
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono:</label>
            <input type="tel" class="form-control" id="telefono" name="telefono" value="{{ $cliente->telefono }}" required>
        </div>
        <div class="form-group">
            <label for="eps">EPS:</label>
            <input type="text" class="form-control" id="eps" name="eps" value="{{ $cliente->eps }}" required>
        </div>
        <div class="btn-group">
            <button type="submit" class="btn btn-primary mr-2">Guardar Cambios</button>
            <a href="{{ route('clientes.show', $cliente->id) }}" class="btn btn-secondary ml-2">Cancelar</a>
        </div>
    </form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
