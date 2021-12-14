<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pembelian;
use App\Models\Produk;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
	function index()
	{

		$pembelians = Pembelian::with('produks')->get();
		// $produks = Produk::get();
		// return view('penjualan', compact('pembelians', 'produks'));
		return response()->json([
			"success" => true,
			"message" => "List Pembelian",
			"data" => $pembelians
		]);
	}

	public function store(Request $request)
	{
		$pd = Produk::find($request->produk);

		// dd($request);
		$count = count($request->produk);
		$totalHarga = 0;
		for ($j = 0; $j < $count; $j++) {
			$prd = Produk::find($request->produk[$j]);
			$totalHarga += $request->banyakbarang[$j] * $prd->harga_beli;
		}
		$pembelian = Pembelian::create([
			'namapemasok' => $request->namapemasok,
			'tanggalpembelian' => $request->tanggalpembelian,
			'totalHarga' => $totalHarga,
		]);

		for ($i = 0; $i < $count; $i++) {
			$pembelian->produks()->attach($request->produk[$i], ['banyakbarang' => $request->banyakbarang[$i]]);
			$prd = Produk::find($request->produk[$i]);
			$prd->stok = $prd->stok + $request->produk[$i];
			$prd->save();
		}
		return response()->json([
			"success" => true,
			"message" => "Transaksi pembelian berhasil.",
			"data" => [$pembelian, $prd]
		]);
	}


	public function destroy($pembelian)
	{
		Pembelian::destroy($pembelian);
		return response()->json([
			"success" => true,
			"message" => "Data pembelian berhasil dihapus.",
			"data" => $pembelian
		]);
	}
}
