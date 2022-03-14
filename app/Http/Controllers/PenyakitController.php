<?php

namespace App\Http\Controllers;

use App\Models\Penyakit;
use Illuminate\Http\Request;

class PenyakitController extends Controller
{
	//
	public function index()
	{
		return view('dashboard.penyakit.index');
	}

	public function create()
	{
		$penyakit_terakhir = Penyakit::latest()->first();

		$kode_penyakit = 'P001';
		if ($penyakit_terakhir != null) {
			$kode_penyakit = 'P00' . ($penyakit_terakhir->id + 1);
		}

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
}