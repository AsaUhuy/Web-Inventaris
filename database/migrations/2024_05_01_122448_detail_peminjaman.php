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
        Schema::create('detail_peminjaman', function (Blueprint $table) {
            $table->id();
            $table->integer('idpeminjaman');
            $table->integer('idinventaris');
            $table->integer('jumlah');
            $table->timestamps();
        
            $table->foreign('idpeminjaman')->references('idpeminjaman')->on('peminjaman')->onDelete('cascade');
            $table->foreign('idinventaris')->references('idinventaris')->on('inventaris')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_peminjaman');
    }
};
