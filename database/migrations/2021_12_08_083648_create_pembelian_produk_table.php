<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembelianProdukTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pembelian_produk', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('pembelian_id')->nullable();
			$table->integer('banyakbarang');
			$table->foreign('pembelian_id')->references('id')->on('pembelians')
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
		Schema::dropIfExists('pembelian_produk');
	}
}
