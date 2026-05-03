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
        Schema::connection('mongodb')->create('users', function (Blueprint $collection) {
            $collection->id();
            $collection->string('nombre');
            $collection->string('apellido');
            $collection->string('usuario')->unique();
            $collection->string('contrasena');
            $collection->string('permisos')->default('user');
            $collection->timestamp('fecha_registro')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mongodb')->dropIfExists('users');
    }
};
