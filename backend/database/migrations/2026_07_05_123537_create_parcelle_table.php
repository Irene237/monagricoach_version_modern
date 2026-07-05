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
    Schema::create('parcelle', function (Blueprint $table) {
        $table->id();
        $table->string('nom_parcelle', 45);
        $table->decimal('superficie_ha', 10, 0);
        $table->string('localisation_gps', 255);
        $table->string('typ_sol', 255);
        $table->date('date_creation');
        $table->string('statut', 255);
        // Clé étrangère
        $table->foreignId('id_agriculteur_proprietaire')->constrained('utilisateur', 'id');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parcelle');
    }
};
