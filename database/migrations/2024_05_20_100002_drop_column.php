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
            $table->dropColumn('x1');
            $table->dropColumn('y1');
            $table->dropColumn('x2');
            $table->dropColumn('y2');
            $table->dropColumn('nama');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('titiks', function (Blueprint $table) {
            //
        });
    }
};
