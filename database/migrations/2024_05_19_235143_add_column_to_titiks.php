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
        Schema::table('titiks', function (Blueprint $table) {
            $table->String('TitikAwal');
            $table->String('TitikAkhir');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('titiks', function (Blueprint $table) {
            
        });
    }
};
