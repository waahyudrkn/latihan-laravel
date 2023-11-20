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
        Schema::create('nilai', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nis');
            $table->unsignedBigInteger('kode_mapel');
            $table->integer('nilai');
            $table->timestamps();
            // Menambahkan constraint foreign key
            $table->foreign('nis')->references('nis')->on('siswas')->onDelete('cascade');
            $table->foreign('kode_mapel')->references('kode_mapel')->on('mapel')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai');
    }
};
