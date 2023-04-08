@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1>Detalles del Cliente</h1>
@stop

@section('content')
    <table class="table">
        <tbody>
            <tr>
                <th>ID:</th>
                <td>{{ $cliente->id }}</td>
            </tr>
            <tr>
                <th>Nombre:</th>
                <td>{{ $cliente->nombre }}</td>
            </tr>
            <tr>
                <th>Apellido:</th>
                <td>{{ $cliente->apellido }}</td>
            </tr>
            <tr>
                <th>Dirección:</th>
                <td>{{ $cliente->direccion }}</td>
            </tr>
            <tr>
                <th>Correo Electrónico:</th>
                <td>{{ $cliente->correo_electronico }}</td>
            </tr>
            <tr>
                <th>Teléfono:</th>
                <td>{{ $cliente->telefono }}</td>
            </tr>
            <tr>
                <th>Fecha de Creación:</th>
                <td>{{ $cliente->fecha_creacion }}</td>
            </tr>
        </tbody>
    </table>
    <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Volver</a>
@stop


