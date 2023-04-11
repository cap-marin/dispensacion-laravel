@extends('adminlte::page')

@section('title', 'Facturas')

@section('content_header')
    <h1>Nueva Factura</h1>
@stop

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('facturas.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="cliente_id">Cliente:</label>
                        <select name="cliente_id" id="cliente_id" class="form-control cliente_id" onchange="updateEps(this)">
                            @foreach ($clientes as $cliente)
                                <option value="{{ $cliente->id }}">{{ $cliente->cedula }} - {{ $cliente->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="eps">EPS:</label>
                        <input type="text" name="eps" id="eps" class="form-control"
                            value="{{ old('eps') }}">
                    </div>
                    <div class="form-group">
                        <label for="fecha">Fecha:</label>
                        <input type="date" name="fecha" id="fecha" class="form-control"
                            value="{{ old('fecha', date('Y-m-d')) }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="tipo_facturacion">Tipo de Facturación:</label>
                        <select name="tipo_facturacion" class="form-control" required>
                            <option value="" disabled selected>Selecciona un tipo de facturación</option>
                            @foreach ($tipoFacturacion as $tf)
                                <option value="{{ $tf->id }}">{{ $tf->descripcion }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="observacion">Observación:</label>
                        <textarea name="observacion" id="observacion" class="form-control">{{ old('observacion') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="usuario_id">Usuario:</label>
                        <input type="text" name="usuario_id" id="usuario_id" class="form-control"
                            value="{{ auth()->user()->name }}" readonly>
                    </div>


                    <label for="detalle_fac">Detalle Factura:</label>

                    <table class="table products-table" id="products-table">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Lote</th>
                                <th>Vencimiento</th>
                                <th>Precio</th>
                                <th>Subtotal</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="fila-producto">
                                <td>
                                    <select class="form-control product-select" name="producto_id[]"
                                        onchange="updatePrice(this)">
                                        <option value="">Seleccione un producto</option>
                                        @foreach ($productos as $product)
                                            <option value="{{ $product->id }}">{{ $product->id }} -
                                                {{ $product->nombre_producto }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td><input type="number" class="form-control cantidad-producto" name="cantidad[]"
                                        id="cantidad[]" min="1" value="0" onchange="calcularSubtotal(this)"></td>
                                <td><input type="text" class="form-control" name="lote[]"></td>
                                <td><input type="date" class="form-control" name="vencimiento[]"></td>
                                <td><input type="text" class="form-control product-price" id="precio[]" id="precio[]" readonly></td>
                                <td><input type="text" class="form-control product-subtotal" id="subtotal[]" name="subtotal[]" readonly>
                                </td>
								
                                <td><button type="button" class="btn btn-danger btn-sm delete-row"><i
                                            class="fas fa-trash-alt"></i></button></td>
                            </tr>
                        </tbody>
                    </table>
					<div class="form-group">
                        <button type="button" class="btn btn-success btn-sm" id="add-row"><i class="fas fa-plus"></i>
                            Agregar Producto</button>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="btn btn-primary" type="button" id="calcular-total">Calcular total</button>
                            </div>
                            <input type="number" class="form-control text-right font-weight-bold" name="total" id="total" readonly required>
                        </div>
                    </div>
                    
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('facturas.index') }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>

    </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.datatables.net/1.10.22/css/daaTables.bootstrap5.min.css" rel="stylesheet">
@stop

@section('js')
    <script>
        function updatePrice(select) {
            const index = Array.from(select.parentNode.parentNode.children).indexOf(select.parentNode);
            let precio = {{ $productos[0]->precio }};
            let lote = '';
            let vencimiento = '';
			
            //let cantidad = select.parentNode.parentNode.children[4].children[0].value;

            const producto = {!! $productos !!}.find(p => p.id == select.value);
            if (producto) {
                precio = producto.precio;
                lote = producto.lote;
                vencimiento = producto.vencimiento;

                ////console.log(cantidad);
                select.parentNode.parentNode.children[4].children[0].value = precio;
                select.parentNode.parentNode.children[3].children[0].value = vencimiento;
                select.parentNode.parentNode.children[2].children[0].value = lote;
                cantidad = select.parentNode.parentNode.children[1].children[0].value;
                //let subtotal = precio * cantidad;
                //select.parentNode.parentNode.children[5].children[0].value = subtotal;
                //$('.product-price').val(precio);

            }
            //select.parentNode.parentNode.children[4].children[0].value = precio;
        }

        function calcularSubtotal(select) {
            select.parentNode.parentNode.children[5].children[0].value = '';
            //var total = 0;
            var subtotal = 0;
            const index = Array.from(select.parentNode.parentNode.children).indexOf(select.parentNode);
            let precio = select.parentNode.parentNode.children[4].children[0].value;
			cantidad = select.parentNode.parentNode.children[1].children[0].value;
            console.log(precio);
            const producto = {!! $productos !!}.find(p => p.id == select.value);
            if (producto) {
                //precio = producto.precio;
                
                subtotal = cantidad * precio;
                console.log(cantidad);

                console.log(subtotal);
                
            }
			select.parentNode.parentNode.children[5].children[0].value = subtotal;


            //total += subtotal;
            //console.log(total);
            // $('#total').val(total);
        }


        function updateEps(select) {
            const index = Array.from(select.parentNode.parentNode.children).indexOf(select.parentNode);
            const producto = {!! $productos !!}.find(p => p.id == select.value);
            const cliente = {!! $clientes !!}.find(p => p.id == select.value);

            let eps = cliente.eps;
            //console.log(index);
            console.log(cliente.eps);
            $('#eps').val(eps);
        }

       
        $(document).ready(function() {

            // calcular subtotal al cambiar el producto o la cantidad
            /*$('.cantidad-producto, .product-subtotal').change(function() {
                var row = $(this).closest('tr');
                var precio = parseFloat(row.find('.product-price').val());
                var cantidad = parseInt(row.find('.cantidad-producto').val());
                var subtotal = precio * cantidad;
                row.find('.product-subtotal').text('$ ' + subtotal.toFixed(2));
            });*/

            $('#calcular-total').on('click', function() {
                var total = 0;
                // Iterar sobre los campos de cantidad de productos y sumar el total
                $('.cantidad-producto').each(function() {
                    var cantidad = parseInt($(this).val());
                    var precio = parseFloat($(this).closest('tr').find('.product-price').val());
                    var subtotal = cantidad * precio;
                    total += subtotal;
                });
                // Actualizar el campo de total
                $('#total').val(total.toFixed(0));
            });
            /* WORKS!
                        function actualizarTotal() {
                            var total = 0;
                            $('.fila-producto').each(function() {
                                console.log("entra")
                                var cantidad = parseInt($(this).find('.cantidad-producto').val());
                                var precio = parseInt($(this).find('.product-price').val());
                                var subtotal = cantidad * precio;
                                total += subtotal;
                            });
                            $('#total').val(total.toFixed(0));
                        }

                        // Escuchar cambios en los campos de cantidad y precio de los productos
                        $('.cantidad-producto, .product-subtotal').on('change', function() {
                            console.log("emtraa")
                            actualizarTotal();
                        });
            */
            // Manejar el evento de agregar filas
            $('#add-row').click(function() {
                var row = $('#products-table tbody tr:last').clone();
                row.find('select,input').val('');
                $('#products-table tbody').append(row);
            });

            // Manejar el evento de eliminar filas
            $(document).on('click', '.delete-row', function() {
                $(this).closest('tr').remove();
            });
        });
    </script>

@stop
