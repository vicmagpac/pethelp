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
        Schema::create('pontos_alimentacao', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->text('descricao')->nullable();
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            $table->string('endereco');
            $table->string('tipo_racao')->default('ração');
            $table->boolean('agua_disponivel')->default(true);
            $table->enum('status_racao', ['vazio', 'baixo', 'ok', 'cheio'])->default('vazio');
            $table->enum('status_agua', ['vazio', 'baixo', 'ok', 'cheio'])->default('vazio');
            $table->string('qr_code')->unique();
            $table->foreignId('criado_por')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pontos_alimentacao');
    }
};
