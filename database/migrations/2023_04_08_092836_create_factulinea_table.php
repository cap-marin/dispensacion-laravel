<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFactulineaTable extends Migration
{
    public function up()
    {
        Schema::create('factulinea', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_formula');
            $table->unsignedBigInteger('id_producto');
            $table->integer('cantidad');
            $table->decimal('precio', 10, 2);
            $table->decimal('total_linea', 10, 2);
            $table->timestamps();

            $table->foreign('id_formula')->references('id')->on('formulas');
            $table->foreign('id_producto')->references('id')->on('productos');
        });
    }

    public function down()
    {
        Schema::dropIfExists('factulinea');
    }
}
