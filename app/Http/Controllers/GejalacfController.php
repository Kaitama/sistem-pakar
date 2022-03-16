<?php

namespace App\Http\Controllers;

use App\Models\Gejalacf;
use App\Models\Penyakit;
use Illuminate\Http\Request;

class GejalacfController extends Controller
{
	//

	public function index()
	{
		$gejalacsf = Gejalacf::with('penyakits')->get();

		return view('dashboard.gejalacf.index', ['gejalacfs' => $gejalacsf]);
	}

	public function create()
	{

		$penyakits = Penyakit::all();
		$gejala = Gejalacf::latest()->first()->with('penyakits');
		$index_baru = ($gejala->id ?? 0) + 1;

		$kode_gejala = 'P' . str_pad($index_baru, 3, '0', STR_PAD_LEFT);


		return view('dashboard.gejalacf.create', ['kode' => $kode_gejala, 'penyakits' => $penyakits]);
	}

	public function store(Request $request)
	{
		$gejala = Gejalacf::create([
			'kode'	=> $request->kode,
			'gejala'	=> $request->gejala,
		]);

		$gejala->penyakits()->sync($request->penyakit);

		return redirect()->route('gejala.cf.index');
	}
}