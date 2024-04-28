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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('division_1_id')->notNull();
            $table->unsignedBigInteger('division_2_id')->notNull();
            $table->timestamp('fecha')->notNull();
            $table->unsignedBigInteger('location_id');
            $table->integer('resultado_division_1')->nullable();
            $table->integer('resultado_division_2')->nullable();
            $table->boolean('status')->default(true)->notNull();
            $table->timestamps();

            $table->foreign('division_1_id')->references('id')->on('divisions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('division_2_id')->references('id')->on('divisions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('location_id')->references('id')->on('locations')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
