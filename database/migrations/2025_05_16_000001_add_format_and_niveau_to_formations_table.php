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
        Schema::table('formations', function (Blueprint $table) {
            $table->enum('format', ['présentiel', 'distanciel', 'hybride'])->default('présentiel')->after('prix');
            $table->enum('niveau_requis', ['débutant', 'intermédiaire', 'avancé'])->default('débutant')->after('format');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('formations', function (Blueprint $table) {
            $table->dropColumn('format');
            $table->dropColumn('niveau_requis');
        });
    }
}; 