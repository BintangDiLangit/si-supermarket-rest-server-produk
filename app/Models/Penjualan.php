<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
	use HasFactory;
	protected $guarded = [];

	public function produks()
	{
		return $this->belongsToMany(Produk::class)->withPivot('banyakbarang');
	}
}
