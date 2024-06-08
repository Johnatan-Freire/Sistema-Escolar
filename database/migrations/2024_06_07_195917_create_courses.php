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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->nullable(false);
            $table->integer('carga_horaria')->nullable(false);
            $table->string('dias')->nullable(false);
            $table->string('turno')->nullable(false);
            $table->text('descricao')->nullable();
            $table->string('imagem')->nullable();
            $table->decimal('preco', 8, 2)->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
