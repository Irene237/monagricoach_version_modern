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
    Schema::create('utilisateur', function (Blueprint $table) {
        $table->id();
        $table->string('email', 45);
        $table->string('mot_de_passe', 255);
        $table->string('nom', 45);
        $table->string('prenom', 45);
        $table->string('telephone', 45);
        $table->string('pays', 150);
        $table->datetime('date_inscription');
        $table->string('type_utilisateur', 45);
        $table->string('reset_token', 255)->nullable();
        $table->datetime('reset_token_expiration')->nullable();
        $table->string('photo', 255)->nullable();
        $table->string('langue', 5)->default('fr');
        $table->string('timezone', 50)->default('Africa/Douala');
        $table->boolean('notif_arrosage')->default(true);
        $table->boolean('notif_stock')->default(false);
        
        // Ajout des timestamps (created_at et updated_at)
        $table->timestamps(); 
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilisateur');
    }
};
