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
        Schema::table('pets', function (Blueprint $table) {
            $table->unsignedBigInteger('sinal_vital_id');
            $table->foreign('sinal_vital_id')->references('id')->on('sinais_vitais');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pets', function (Blueprint $table) {
            $table->dropForeign(['sinal_vital_id']);
            $table->dropColumn('sinal_vital_id');
        });
    }
};
