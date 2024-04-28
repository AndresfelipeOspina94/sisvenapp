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
        Schema::create('proveedores', function (Blueprint $table) {
            $table->increments('proveedor_id');
            $table->string('proveedor_nombre', 100);
            $table->string('proveedor_nombre_contacto', 100);
            $table->string('proveedor_celular', 20);
            $table->string('proveedor_email', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_proveedores');
    }
};
