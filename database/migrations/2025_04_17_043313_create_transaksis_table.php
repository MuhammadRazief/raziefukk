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
        
    Schema::create('transaksis', function (Blueprint $table) {
        $table->id();
        $table->string('kode_transaksi')->unique(); 
        $table->unsignedBigInteger('produk_id'); 
        $table->integer('jumlah'); 
        $table->integer('total_harga'); 
        $table->dateTime('tanggal_transaksi'); 
        $table->timestamps();

        
        $table->foreign('produk_id')->references('id')->on('produks')->onDelete('cascade');
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
