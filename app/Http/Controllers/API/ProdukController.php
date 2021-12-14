<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProdukController extends Controller
{
	public function index()
	{
		$products = Produk::with('kategori')->get();
		return response()->json([
			"success" => true,
			"message" => "List Produk",
			"data" => $products
		]);
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$input = $request->all();
		$validator = Validator::make($input, [
			'nama_produk' => 'required',
			'stok' => 'required',
			'tanggal_kadaluwarsa' => 'required',
			'deskripsi_produk' => 'required',
			'harga_beli' => 'required',
			'harga_jual' => 'required',
			'id_kategori' => 'required'
		]);
		if ($validator->fails()) {
			return $this->sendError('Validation Error.', $validator->errors());
		}
		$product = Produk::create($input);
		return response()->json([
			"success" => true,
			"message" => "Product created successfully.",
			"data" => $product
		]);
	}
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$product = Produk::find($id);
		if (is_null($product)) {
			return $this->sendError('Product not found.');
		}
		return response()->json([
			"success" => true,
			"message" => "Product retrieved successfully.",
			"data" => $product
		]);
	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Produk $produk)
	{
		$produk = Produk::find($produk->id);
		$input = $request->all();
		$validator = Validator::make($input, [
			'nama_produk' => 'required',
			'stok' => 'required',
			'tanggal_kadaluwarsa' => 'required',
			'deskripsi_produk' => 'required',
			'harga_beli' => 'required',
			'harga_jual' => 'required',
			'id_kategori' => 'required'
		]);
		if ($validator->fails()) {
			return $this->sendError('Validation Error.', $validator->errors());
		}
		$data = $produk->update($input);
		return response()->json([
			"success" => true,
			"message" => "Product updated successfully.",
			"data" => $data
		]);
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($produk)
	{
		Produk::destroy($produk);
		return response()->json([
			"success" => true,
			"message" => "Product deleted successfully.",
			"data" => $produk
		]);
	}
}
