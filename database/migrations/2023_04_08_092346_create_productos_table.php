<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_producto', 100);
            $table->decimal('precio', 10, 2);
            $table->string('lote', 50);
            $table->date('vencimiento');
            $table->enum('estado', ['activo', 'inactivo']);
            $table->timestamp('fecha_creacion')->default(DB::raw('CURRENT_TIMESTAMP'));

            // Opcional: agregar índice a una columna
            $table->index('nombre_producto');
        });
    }

    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
