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
        Schema::create('kriteria_nilais', function (Blueprint $table) {
            $table->id();
            $table->string('kriteria', 20);
            $table->tinyInteger('bobot')->default(0);
            $table->tinyInteger('nilai_awal')->default(0);
            $table->tinyInteger('nilai_akhir')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kriteria_nilais');
    }
};
