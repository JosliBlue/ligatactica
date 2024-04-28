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
            $table->string('nombre')->notNull();
            $table->string('segundo_nombre')->nullable();
            $table->string('apellido')->notNull();
            $table->string('segundo_apellido')->nullable();
            $table->date('fecha_nacimiento')->notNull();
            $table->string('url_foto')->notNull();
            $table->unsignedBigInteger('division_id');
            $table->boolean('status')->default(true)->notNull();
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
