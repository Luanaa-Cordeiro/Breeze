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
        Schema::create('musicas', function (Blueprint $table) {
            $table->id(); 
            $table->string('nome');  
            $table->unsignedBigInteger('id_artista');  
            $table->unsignedBigInteger('id_album');  
            $table->unsignedBigInteger('id_genero');  

    
            $table->foreign('id_artista')
                  ->references('id')->on('artistas')
                  ->onDelete('cascade')  
                  ->onUpdate('no action'); 

            $table->foreign('id_album')
                  ->references('id')->on('albums')
                  ->onDelete('cascade') 
                  ->onUpdate('no action');

            $table->foreign('id_genero')
                  ->references('id')->on('generos')
                  ->onDelete('cascade')  
                  ->onUpdate('no action');  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('musicas');
    }
};
