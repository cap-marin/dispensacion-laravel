@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <h1>Lista Productos</h1>
@stop

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="container">
        <p>
            <a href="{{ route('productos.create') }}" class="btn btn-success">
                Nuevo Producto
            </a>
        </p>
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Lote</th>
                    <th>Vencimiento</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                    <tr>
                        <td>{{ $producto->nombre_producto }}</td>
                        <td>{{ $producto->precio }}</td>
                        <td>{{ $producto->lote }}</td>
                        <td>{{ $producto->vencimiento }}</td>
                        <td>{{ $producto->estado }}</td>
                        <td>
                            <a href="{{ route('productos.show', $producto->id) }}" class="btn btn-sm btn-info">Ver</a>
                            <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-sm btn-warning">
                                Editar
                            </a>
                            <form action="{{ route('productos.destroy', $producto->id) }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
