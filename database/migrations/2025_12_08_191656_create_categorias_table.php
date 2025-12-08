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
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string('name');
           
            // Desempenho actual da categoria. Alta ou baixa 1 - 0
            $table->boolean('status');
           
            // Files imagem da categoria 
            $table->string('image')->default('categoria-imagem');
           
            // Detalhes da categoria
            $table->text('desc')->nullable();

            // Relacionamentos
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categorias');
    }
};
