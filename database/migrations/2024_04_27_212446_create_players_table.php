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
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('cedula')->unique()->notNull();
            $table->string('nombres')->notNull();
            $table->string('apellidos')->notNull();
            $table->date('fecha_nacimiento')->notNull();
            $table->string('url_foto')->notNull();
            $table->unsignedBigInteger('division_id')->nullable();
            $table->unsignedInteger('numero_camiseta')->nullable();
            $table->timestamps();

            $table->foreign('division_id')->references('id')->on('divisions')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
