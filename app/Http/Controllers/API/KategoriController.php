<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
	public function index()
	{
		$kategoris = Kategori::all();
		return response()->json([
			"success" => true,
			"message" => "List Kategori",
			"data" => $kategoris
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
			'nama_kategori' => 'required',
			'deskripsi_kategori' => 'required'
		]);
		if ($validator->fails()) {
			return $this->sendError('Validation Error.', $validator->errors());
		}
		$kategori = Kategori::create($input);
		return response()->json([
			"success" => true,
			"message" => "Kategori berhasil ditambahkan.",
			"data" => $kategori
		]);
	}

	public function update(Request $request, Kategori $kategori)
	{
		$kategori = Kategori::find($kategori->id);
		$input = $request->all();
		$validator = Validator::make($input, [
			'nama_kategori' => 'required',
			'deskripsi_kategori' => 'required'
		]);

		if ($validator->fails()) {
			return $this->sendError('Validation Error.', $validator->errors());
		}
		$data = $kategori->update($input);
		return response()->json([
			"success" => true,
			"message" => "kategori berhasil diupdate.",
			"data" => $data
		]);
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($kategori)
	{
		Kategori::destroy($kategori);
		return response()->json([
			"success" => true,
			"message" => "kategori berhasil dihapus.",
			"data" => $kategori
		]);
	}
}
