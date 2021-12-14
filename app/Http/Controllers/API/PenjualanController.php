<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Penjualan;
use App\Models\Produk;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{

	function index()
	{

		$penjualans = Penjualan::with('produks')->get();
		// $produks = Produk::get();
		// return view('penjualan', compact('penjualans', 'produks'));
		return response()->json([
			"success" => true,
			"message" => "List Penjualan",
			"data" => $penjualans
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
			$totalHarga += $request->banyakbarang[$j] * $prd->harga_jual;
		}
		$penjualan = Penjualan::create([
			'namapembeli' => $request->namapembeli,
			'tanggalpenjualan' => $request->tanggalpenjualan,
			'totalHarga' => $totalHarga,
		]);

		for ($i = 0; $i < $count; $i++) {
			$penjualan->produks()->attach($request->produk[$i], ['banyakbarang' => $request->banyakbarang[$i]]);
			$prd = Produk::find($request->produk[$i]);
			$prd->stok = $prd->stok - $request->produk[$i];
			$prd->save();
		}
		return response()->json([
			"success" => true,
			"message" => "Transaksi penjualan berhasil.",
			"data" => [$penjualan, $prd]
		]);
	}

	public function destroy($penjualan)
	{
		Penjualan::destroy($penjualan);
		return response()->json([
			"success" => true,
			"message" => "Data penjualan berhasil dihapus.",
			"data" => $penjualan
		]);
	}
}
