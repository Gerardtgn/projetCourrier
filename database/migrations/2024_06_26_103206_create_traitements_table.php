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
        Schema::create('traitements', function (Blueprint $table) {
            $table->integer('no');
            // $table->foreignId('id_affectation')->constrained()->onDelete('cascade');
            // $table->foreignId('id_user')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('id_affectation');
            $table->foreign('id_affectation')->references('id')->on('affectations')->onDelete('cascade');
            // $table->foreignId('id_service')->constrained()->onDelete('cascade');
            // $table->foreignId('id_courrier_arrivee')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');

            $table->date('date');
            $table->string('commentaire')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('traitements');
    }
};
