<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
	use HasFactory;
	protected $fillable = [
		'nama_produk',
		'stok',
		'tanggal_kadaluwarsa',
		'deskripsi_produk',
		'harga_beli',
		'harga_jual',
		'id_kategori',
		'id_pemasok',
	];

	public function kategori()
	{
		return $this->belongsTo(Kategori::class, 'id_kategori', 'id');
	}
	public function penjualans()
	{
		return $this->belongsToMany(Penjualan::class)->withPivot('banyakbarang');
	}
	public function pembelians()
	{
		return $this->belongsToMany(Pembelian::class)->withPivot('banyakbarang');
	}
}
