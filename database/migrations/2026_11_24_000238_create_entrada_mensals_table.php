<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('entrada_mensals', function (Blueprint $table) {
            $table->id();

            $table->foreignId('entrada_id')
                ->constrained('entradas')
                ->cascadeOnDelete();

            $table->unsignedTinyInteger('mes');
            $table->unsignedSmallInteger('ano');
            $table->decimal('valor', 12, 2);
            $table->boolean('recebida')->default(false);

            $table->timestamps();

            $table->unique(['entrada_id', 'mes', 'ano']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('entrada_mensals');
    }
};
