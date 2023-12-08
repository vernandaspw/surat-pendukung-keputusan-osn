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
        Schema::create('data_pesertas', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 30)->nullable()->unique();
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama', 40)->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->text('bio')->nullable();
            $table->foreignId('kelas_id')->nullable()->constrained('kelas')->onUpdate('set null')->onDelete('set null');
            $table->foreignId('sub_kelas_id')->nullable()->constrained('sub_kelas')->onUpdate('set null')->onDelete('set null');
            $table->text('alamat')->nullable();
            $table->string('telp', 15)->nullable();
            $table->boolean('isaktif')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pesertas');
    }
};
