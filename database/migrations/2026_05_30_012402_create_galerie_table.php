<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('galerie', function (Blueprint $table) {
            $table->id();
            $table->string('titre')->nullable();
            $table->string('chemin');
            $table->string('alt')->nullable();
            $table->integer('ordre')->default(0);
            $table->boolean('visible')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('galerie');
    }
};
