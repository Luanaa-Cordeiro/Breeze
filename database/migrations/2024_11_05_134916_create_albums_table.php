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
        Schema::create('albums', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->unique();
            $table->date('data_lanc');
            $table->unsignedBigInteger('id_artista');

            $table->foreign('id_artista')
            ->references('id')
            ->on('artistas')
            ->onDelete('cascade')  // Quando um artista for deletado, todos os álbuns dele serão deletados
            ->onUpdate('no action');  // Não faz nada se o ID do artista for alterado

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('albums');
    }
};
