@extends('adminlte::page')

@section('title', 'Facturas')

@section('content_header')
    <h1>Editar Factura</h1>
@stop

@section('content')
    <div class="container">
        <form action="{{ route('facturas.update', $factura->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" class="form-control" id="fecha" name="fecha"
                    value="{{ date('Y-m-d', strtotime($factura->fecha_venta)) }}">
            </div>
            <div class="form-group">
                <label for="cliente_id">Cliente:</label>
                <select class="form-control" id="cliente_id" name="cliente_id">
                    @foreach ($clientes as $cliente)
                        <option value="{{ $cliente->id }}" {{ $cliente->id == $factura->cliente_id ? 'selected' : '' }}>
                            {{ $cliente->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tipo_facturacion">Tipo de facturación:</label>
                <select class="form-control" id="tipo_facturacion" name="tipo_facturacion">
                    @foreach ($tiposFacturacion as $tipoFacturacion)
                        <option value="{{ $tipoFacturacion->id }}"
                            {{ $tipoFacturacion->id == $factura->tipo_facturacion_id ? 'selected' : '' }}>
                            {{ $tipoFacturacion->descripcion }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="total">Total:</label>
                <input type="number" class="form-control" id="total" name="total" value="{{ $factura->total }}">
            </div>
            <div class="form-group productos-container" id="productos">
                <label for="productos">Productos:</label>
                @foreach ($factuLinea as $linea)
                    <div class="form-row producto-fila">
                        <div class="col">
                            <select class="form-control producto-selector" id="producto_id" name="producto_id[]">
                                @foreach ($productos as $producto)
                                    <option value="{{ $producto->id }}"
                                        {{ $producto->id == $linea->id_producto ? 'selected' : '' }}>
                                        {{ $producto->nombre_producto }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <input type="number" class="form-control cantidad-input" id="cantidad" name="cantidad[]"
                                value="{{ $linea->cantidad }}">
                        </div>
                        <div class="col">
                            <input type="number" class="form-control precio-input" id="precio" name="precio[]"
                                value="{{ $linea->precio }}">
                        </div>
                        <div class="col">
                            <input type="number" class="form-control subtotal" name="subtotal[]" readonly>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-success btn-sm" id="add-row"><i class="fas fa-plus"></i> Agregar
                    Producto</button>

            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button class="btn btn-primary" type="button" id="calcular-total">Calcular total</button>
                    </div>
                    <input type="number" class="form-control text-right font-weight-bold" name="total" id="total"
                        readonly>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </form>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        var productos = {!! json_encode($productos) !!};
        $(document).ready(function() {

            $(document).on('change', '.producto-selector', function() {
                var productoId = $(this).val();
                var precioInput = $(this).closest('.form-row').find('.precio-input');
                var precioProducto = productos.find(p => p.id == productoId).precio;
                precioInput.val(precioProducto);
            });


            // calcular subtotal al cambiar el producto o la cantidad
            /*$('.cantidad-producto, .product-subtotal').change(function() {
                var row = $(this).closest('tr');
                var precio = parseFloat(row.find('.product-price').val());
                var cantidad = parseInt(row.find('.cantidad-producto').val());
                var subtotal = precio * cantidad;
                row.find('.product-subtotal').text('$ ' + subtotal.toFixed(2));
            });*/

            $('#calcular-total').click(function() {
                var total = 0;
                $('#productos .form-row').each(function() {
                    var cantidad = $(this).find('[name="cantidad[]"]').val();
                    var precio = $(this).find('[name="precio[]"]').val();
                    var subtotal = cantidad * precio;
                    total += subtotal;
                });
                $('[name="total"]').val(total);
            });


            // Manejar el evento de agregar filas
            $('#add-row').click(function() {
                var fila = $('#productos .form-row:first').clone();
                fila.find('input').val('');
                fila.find('select').prop('selectedIndex', 0);
                $('#productos').append(fila);
            });


            // Manejar el evento de eliminar filas
            $(document).on('click', '.delete-row', function() {
                $(this).closest('tr').remove();
            });

            // Escuchar el evento change de los campos de cantidad y precio de cada producto
            $(document).on('change', '.cantidad-input, .precio-input', function() {
                var cantidad = $(this).closest('.form-row').find('.cantidad-input').val();
                var precio = $(this).closest('.form-row').find('.precio-input').val();
                var subtotal = cantidad * precio;
                $(this).closest('.form-row').find('.subtotal').val(subtotal);
                var total = 0;
                $('.subtotal').each(function() {
                    total += parseInt($(this).val());
                });
                $('[name="total"]').val(total);
            });
        });
    </script>
@stop
