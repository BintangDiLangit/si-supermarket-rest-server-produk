<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('produks', function (Blueprint $table) {
			$table->id();
			$table->string('nama_produk');
			$table->integer('stok');
			$table->string('tanggal_kadaluwarsa');
			$table->longText('deskripsi_produk');
			$table->float('harga_beli');
			$table->float('harga_jual');
			$table->unsignedBigInteger('id_kategori');
			$table->foreign('id_kategori')->references('id')->on('kategoris')->onDelete('cascade');
			$table->integer('id_pemasok');
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
		Schema::dropIfExists('produks');
	}
}
