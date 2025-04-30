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
        Schema::table('inscriptions', function (Blueprint $table) {
            // Ajout du nouveau champ
            $table->foreignId('ville_id')->nullable()->after('numero_cni');
            
            // Suppression de l'ancien champ
            $table->dropColumn('ville_commune');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inscriptions', function (Blueprint $table) {
            // Ajout de l'ancien champ
            $table->string('ville_commune')->nullable()->after('numero_cni');
            
            // Suppression du nouveau champ
            $table->dropColumn('ville_id');
        });
    }
};
