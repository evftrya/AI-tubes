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
        Schema::create('zoo_location', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // Tambahkan kolom lain sesuai kebutuhan seperti latitude, longitude, dll.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zoo_location');
    }
};
