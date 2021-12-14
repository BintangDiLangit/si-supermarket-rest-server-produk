<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualanProdukTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('penjualan_produk', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('penjualan_id')->nullable();
			$table->integer('banyakbarang');
			$table->foreign('penjualan_id')->references('id')->on('penjualans')
				->onDelete('cascade');
			$table->unsignedBigInteger('produk_id')->nullable();
			$table->foreign('produk_id')->references('id')->on('produks')
				->onDelete('cascade');
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
		Schema::dropIfExists('penjualan_produk');
	}
}
