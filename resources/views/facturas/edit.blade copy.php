@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Editar Factura</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('facturas.update', $factura->id_formula) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="cliente_id">Cliente:</label>
                            <select class="form-control" id="cliente_id" name="cliente_id">
                                @foreach($clientes as $cliente)
                                    <option value="{{ $cliente->id }}" {{ ($factura->cliente_id == $cliente->id) ? 'selected' : '' }}>{{ $cliente->cedula }} - {{ $cliente->nombre }} - {{ $cliente->eps }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="fecha">Fecha:</label>
                            <input type="date" class="form-control" id="fecha" name="fecha" value="{{ $factura->fecha }}">
                        </div>
                        <div class="form-group">
                            <label for="tipo_facturacion_id">Tipo Facturación:</label>
                            <select class="form-control" id="tipo_facturacion_id" name="tipo_facturacion_id">
                                @foreach($tipos_facturacion as $tipo_facturacion)
                                    <option value="{{ $tipo_facturacion->id }}" {{ ($factura->tipo_facturacion_id == $tipo_facturacion->id) ? 'selected' : '' }}>{{ $tipo_facturacion->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="observacion">Observación:</label>
                            <textarea class="form-control" id="observacion" name="observacion">{{ $factura->observacion }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="usuario">Usuario:</label>
                            <input type="text" class="form-control" id="usuario" name="usuario" value="{{ $factura->usuario }}">
                        </div>
                        <hr>
                        <h4>Detalle de Factura</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Lote</th>
                                    <th>Vencimiento</th>
                                    <th>Precio</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($factura as $item)
                                <div class="form-group">
                                  <label for="id_producto">Producto</label>
                                  <select name="id_producto[]" id="id_producto" class="form-control">
                                    <option value="">Seleccione un producto</option>
                                    @foreach ($productos as $producto)
                                      <option value="{{ $producto->id == $facturapro ? 'selected' : '' }}">
                                      {{ $tipo_facturacion->id }}" {{ ($factura->tipo_facturacion_id == $tipo_facturacion->id) ? 'selected' : '' }}>{{ $tipo_facturacion->descripcion }}
                                        {{ $producto->nombre }}
                                      </option>
                                    @endforeach
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label for="cantidad">Cantidad</label>
                                  <input type="number" name="cantidad[]" id="cantidad" class="form-control" value="0">
                                </div>
                                <div class="form-group">
                                  <label for="lote">Lote</label>
                                  <input type="text" name="lote[]" id="lote" class="form-control" value="{{ $producto->lote }}">
                                </div>
                                <div class="form-group">
                                  <label for="vencimiento">Vencimiento</label>
                                  <input type="date" name="vencimiento[]" id="vencimiento" class="form-control" value="{{ $producto->vencimiento }}">
                                </div>
                                <div class="form-group">
                                  <label for="precio">Precio</label>
                                  <input type="number" name="precio[]" id="precio" class="form-control" value="{{ $producto->precio }}">
                                </div>
                              @endforeach

                            </tbody>
                        </table>
                        <div class="form-group">
                            <a href="{{ route('facturas.create', $factura->id) }}" class="btn btn-primary">Agregar Productos</a>
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </form>
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
    <script> console.log('Hi!'); </script>
@stop