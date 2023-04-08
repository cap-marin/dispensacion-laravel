@extends('adminlte::page')

@section('title', 'Tipo Facturacion')

@section('content_header')
    <h1>Lista Tipo Facturación</h1>
@stop

@section('content')
    <div class="container">
        <p>
            <a href="{{ route('tipo_facturacion.create') }}" class="btn btn-success">
                Nuevo Tipo
            </a>
        </p>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Descripción</th>
                                    <th>Fecha de creación</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tipos_facturacion as $tipoFacturacion)
                                    <tr>
                                        <td>{{ $tipoFacturacion->id }}</td>
                                        <td>{{ $tipoFacturacion->descripcion }}</td>
                                        <td>{{ $tipoFacturacion->fecha_creacion }}</td>
                                        <td>
                                            <a href="{{ route('tipo_facturacion.edit', $tipoFacturacion->id) }}"
                                                class="btn btn-sm btn-warning">Editar</a>

                                            <form action="{{ route('tipo_facturacion.destroy', $tipoFacturacion->id) }}"
                                                method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('¿Estás seguro de que deseas eliminar este tipo de facturación?')">Eliminar</button>
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
