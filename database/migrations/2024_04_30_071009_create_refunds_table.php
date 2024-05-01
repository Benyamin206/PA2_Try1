<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refund_pemesanan_jadwal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pemesanan_jadwal_id')->constrained('pemesanan_jadwal');
            $table->string('alasan');
            $table->string('rekening_pengembalian');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('refund_pemesanan_jadwal');
    }
};
