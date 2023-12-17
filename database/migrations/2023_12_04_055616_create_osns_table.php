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
        Schema::create('osns', function (Blueprint $table) {
            $table->id();
            $table->text('nama');
            $table->longText('keterangan');
            $table->date('tgl_buka');
            $table->date('tgl_tutup');
            $table->date('tgl_pengumuman');
            $table->tinyInteger('bobot_rapot')->default(1);
            $table->tinyInteger('bobot_matematika')->default(1);
            $table->tinyInteger('bobot_fisika')->default(1);
            $table->tinyInteger('bobot_kimia')->default(1);
            $table->tinyInteger('bobot_biologi')->default(1);
            $table->integer('peserta_lulus');
            $table->boolean('isaktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('osns');
    }
};
