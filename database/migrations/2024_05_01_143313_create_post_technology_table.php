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
        Schema::create('post_technology', function (Blueprint $table) {
            // gli dico che deve essere una chiave esterna con vincolo
            $table->foreignId('post_id')->constrained()->cascadeOnDelete();
            // il metodo cascadeOnDelete elimina la riga di questa tabella ponte in caso la riga a cui fa riferimento tramite la sua chiave esterna
            // venga cancellata dalla tabella collegata

            $table->foreignId('technology_id')->constrained()->cascadeOnDelete();

            // per convenzione si indica comunque che il database deve considerare come chiave primaria
            // la coppia dei due valori
            $table->primary(['post_id', 'technology_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_technology');
    }
};
