<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('titiks', function (Blueprint $table) {
        $table->dropColumn(['posisi_x', 'posisi_y']);
    });
}

public function down()
{
    Schema::table('titiks', function (Blueprint $table) {
        $table->integer('posisi_x');
        $table->integer('posisi_y');
    });
}
};
