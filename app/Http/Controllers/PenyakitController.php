<?php

namespace App\Http\Controllers;

use App\Models\Penyakit;
use Illuminate\Http\Request;

class PenyakitController extends Controller
{
	//
	public function index()
	{
		$penyakits = Penyakit::orderBy('kode')->get();
		return view('dashboard.penyakit.index', ['penyakits' => $penyakits]);
	}

	public function create()
	{
		$penyakit = Penyakit::latest()->first();
		$index_baru = $penyakit->id + 1;

		$kode_penyakit = 'P' . str_pad($index_baru, 3, '0', STR_PAD_LEFT);


		return view('dashboard.penyakit.create', ['kode' => $kode_penyakit]);
	}

	public function store(Request $request)
	{

		Penyakit::create([
			'kode'	=> $request->kode,
			'penyakit'	=> $request->penyakit,
			'solusi'	=> $request->solusi
		]);

		return redirect()->route('penyakit.index');
	}

	public function edit($id)
	{
		$penyakit = Penyakit::find($id);
		return view('dashboard.penyakit.edit', ['penyakit' => $penyakit]);
	}

	public function update($id, Request $request)
	{
		Penyakit::find($id)->update($request->all());
		return redirect()->route('penyakit.index');
	}

	public function destroy($id, Request $request)
	{
		Penyakit::find($id)->delete();
		return redirect()->back();
	}
}