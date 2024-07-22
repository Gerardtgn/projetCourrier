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
        Schema::create('courrier_arrivees', function (Blueprint $table) {
            $table->id();
            $table->date('date_ajout');
            $table->date('date_recu');
            $table->string('expediteur');
            $table->string('fichier');
            $table->string('objet');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courrier_arrivees');
    }
};
