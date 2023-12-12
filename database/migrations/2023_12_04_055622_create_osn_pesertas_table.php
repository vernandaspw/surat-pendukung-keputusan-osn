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
        Schema::create('osn_pesertas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('osn_id')->constrained('osns')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('data_peserta_id')->constrained('data_pesertas')->onUpdate('cascade')->onDelete('cascade');
            $table->tinyInteger('nilai_matematika')->default(0);
            $table->tinyInteger('nilai_fisika')->default(0);
            $table->tinyInteger('nilai_kimia')->default(0);
            $table->tinyInteger('nilai_biologi')->default(0);
            $table->decimal('nilai_saw', 5)->default(0);
            $table->boolean('status_seleksi')->default(true);
            $table->boolean('status_lulus')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('osn_pesertas');
    }
};
