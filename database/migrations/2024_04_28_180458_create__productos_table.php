<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('producto_id');
            $table->string('producto_name', 100);
            $table->integer('categoria_id')->unsigned();
            $table->integer('proveedor_id')->unsigned();
            $table->decimal('precio_producto', 18, 2);
            $table->integer('cantidad_stock');
            $table->timestamps();
        
            $table->foreign('categoria_id')->references('categoria_id')->on('categorias');
            $table->foreign('proveedor_id')->references('proveedor_id')->on('proveedores');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
