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
        Schema::create('affectations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_service');
            $table->foreign('id_service')->references('id')->on('services')->onDelete('cascade');
            // $table->foreignId('id_service')->constrained()->onDelete('cascade');
            // $table->foreignId('id_courrier_arrivee')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('id_courrier_arrivee');
            $table->foreign('id_courrier_arrivee')->references('id')->on('courrier_arrivees')->onDelete('cascade');
            $table->date('date');
            $table->text('instruction')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affectations');
    }
};
