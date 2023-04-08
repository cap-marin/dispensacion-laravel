@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Nueva Factura</h1>
@stop

@section('content')

<form method="post" action="{{ route('facturas.store') }}">
	@csrf
	<div>
		<label for="cedula_cliente">Cédula del Cliente:</label>
		<input type="text" name="cedula_cliente" id="cedula_cliente" required>
	</div>
	<div>
		<label for="nombre_cliente">Nombre del Cliente:</label>
		<select name="nombre_cliente" id="nombre_cliente" required>
			@foreach($clientes as $cliente)
			<option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
			@endforeach
		</select>
	</div>
	<div>
		<label for="eps_cliente">EPS del Cliente:</label>
		<select name="eps_cliente" id="eps_cliente" required>
			@foreach($clientes as $cliente)
			<option value="{{ $cliente->id }}">{{ $cliente->eps }}</option>
			@endforeach
		</select>
	</div>
	<div>
		<label for="fecha">Fecha:</label>
		<input type="date" name="fecha" id="fecha" required>
	</div>
	<div>
		<label for="tipo_facturacion">Tipo Facturación:</label>
		<select name="tipo_facturacion" id="tipo_facturacion" required>
			@foreach($tipoFacturacion as $tipo_facturacion)
			<option value="{{ $tipo_facturacion->id }}">{{ $tipo_facturacion->descripcion }}</option>
			@endforeach
		</select>
	</div>
	<div>
		<label for="observacion">Observación:</label>
		<textarea name="observacion" id="observacion"></textarea>
	</div>
	<div>
		<label for="usuario">Usuario:</label>
		<input type="text" name="usuario" id="usuario" required>
	</div>
	<div>
		<label for="productos">Productos:</label>
		@foreach($productos as $producto)
		<div>
			<input type="checkbox" name="productos[]" id="producto_{{ $producto->id }}" value="{{ $producto->id }}">
			<label for="producto_{{ $producto->id }}">{{ $producto->nombre }} - Lote: {{ $producto->lote }} - Vencimiento: {{ $producto->vencimiento }} - Precio: {{ $producto->precio }}</label>
			<input type="number" name="cantidades[]" id="cantidad_{{ $producto->id }}" min="1" max="999" value="1">
		</div>
		@endforeach
	</div>
	<button type="submit">Guardar Venta</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
	<link href="https://cdn.datatables.net/1.10.22/css/daaTables.bootstrap5.min.css" rel="stylesheet">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop