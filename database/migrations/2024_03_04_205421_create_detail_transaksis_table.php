<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nomor_struk');
            $table->foreign('nomor_struk')->references('id')->on('transaksis');

            $table->unsignedBigInteger('nama_produk');
            $table->foreign('nama_produk')->references('id')->on('produks')->onDelete('cascade');

            $table->unsignedInteger('jumlah_produk');
            $table->decimal('subtotal', 17, 3);
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
        Schema::dropIfExists('detail_transaksis');
    }
};
