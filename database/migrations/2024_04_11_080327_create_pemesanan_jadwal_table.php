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
        Schema::create('pemesanan_jadwal', function (Blueprint $table) {
            $table->uuid('id', 255)->primary(); // menggunakan uuid sebagai primary key
            $table->string('status_pembayaran')->default('Unpaid');
            $table->bigInteger('total_harga');
            $table->text('snap_token')->nullable();
            $table->boolean('refund')->default(false);
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('jadwal_id')->constrained('jadwals');
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
        Schema::dropIfExists('pemesanan_jadwal');
    }
};


