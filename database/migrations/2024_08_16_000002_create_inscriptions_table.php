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
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenoms');
            $table->string('numero_cni')->nullable();
            $table->string('ville_commune');
            $table->string('contact');
            $table->string('email')->nullable();
            $table->string('niveau_etude')->nullable();
            $table->foreignId('formation_id')->constrained('formations')->onDelete('cascade');
            $table->enum('statut', ['en_attente', 'confirmé', 'annulé'])->default('en_attente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscriptions');
    }
}; 