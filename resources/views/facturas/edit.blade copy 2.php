@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Factura') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('facturas.update', $factura->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="cliente_id" class="col-md-4 col-form-label text-md-right">{{ __('Cliente') }}</label>

                            <div class="col-md-6">
                                <select id="cliente_id" name="cliente_id" class="form-control">
                                    @foreach($clientes as $cliente)
                                        <option value="{{$cliente->id}}" @if($factura->cliente_id == $cliente->id) selected @endif>{{$cliente->nombre}}</option>
                                    @endforeach
                                </select>

                                @error('cliente_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tipo_facturacion_id" class="col-md-4 col-form-label text-md-right">{{ __('Tipo Facturación') }}</label>

                            <div class="col-md-6">
                                <select id="tipo_facturacion_id" name="tipo_facturacion_id" class="form-control">
                                    @foreach($tipos_facturacion as $tipo_facturacion)
                                        <option value="{{$tipo_facturacion->id}}" @if($factura->id_tipo_facturacion == $tipo_facturacion->id) selected @endif>{{$tipo_facturacion->descripcion}}</option>
                                    @endforeach
                                </select>

                                @error('tipo_facturacion_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="total" class="col-md-4 col-form-label text-md-right">{{ __('Total') }}</label>

                            <div class="col-md-6">
                                <input id="total" type="number" step="0.01" class="form-control @error('total') is-invalid @enderror" name="total" value="{{ $factura->total }}" required autocomplete="total">

                                @error('total')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Factura') }}
                                </button>
                                <a href="{{route('facturas.index')}}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                            </div>
                        </div>
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