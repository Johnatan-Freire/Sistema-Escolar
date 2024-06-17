<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->nullable(false);
            $table->string('cpf')->nullable(false);
            $table->date('data_nascimento')->nullable(false);
            $table->string('nome_responsavel')->nullable();
            $table->string('cpf_responsavel')->nullable();
            $table->date('data_nascimento_responsavel')->nullable();
            $table->string('fone')->nullable(false);
            $table->string('fone2')->nullable();
            $table->string('cep')->nullable(false);
            $table->string('endereco')->nullable(false);
            $table->text('observacao')->nullable();
            $table->string('curso')->nullable();
            $table->string('situacao_financeira')->nullable();
            $table->string('situacao_cadastral')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
