<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('grades', function (Blueprint $table) {
        $table->id();
        $table->foreignId('student_id')->constrained()->onDelete('cascade');
        $table->foreignId('module_id')->constrained()->onDelete('cascade');
        $table->decimal('nota', 5, 2)->nullable(false);
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('grades');
}
};
