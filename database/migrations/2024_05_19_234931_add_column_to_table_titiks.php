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
            $table->integer('x1');
            $table->integer('y1');
            $table->integer('x2');
            $table->integer('y2');
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
