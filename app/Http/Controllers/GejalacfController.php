<?php

namespace App\Http\Controllers;

use App\Models\Gejalacf;
use App\Models\Penyakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class GejalacfController extends Controller
{
	//

	public function index()
	{
		$gejalacsf = Gejalacf::orderBy('kode')->with('penyakits')->get();

		return view('dashboard.gejalacf.index', ['gejalacfs' => $gejalacsf]);
	}

	public function create()
	{

		$gejala = Gejalacf::orderByDesc('kode')->first();

		$last_kode = substr($gejala->kode ?? '', -3);
		$index_baru = ((int) $last_kode) + 1;

		$kode_gejala = 'G' . str_pad($index_baru, 3, '0', STR_PAD_LEFT);


		return view('dashboard.gejalacf.create', ['kode' => $kode_gejala]);
	}

	public function store(Request $request)
	{
		$gejala = Gejalacf::create([
			'kode'	=> $request->kode,
			'gejala'	=> $request->gejala,
			'bobot'	=> $request->bobot,
		]);

		return redirect()->back();
	}

	public function edit($id)
	{
		$gejala = Gejalacf::find($id);

		return view('dashboard.gejalacf.edit', ['gejala' => $gejala]);
	}

	public function update($id, Request $request)
	{
		Gejalacf::find($id)->update($request->all());
		return redirect()->route('gejala.cf.index');
	}

	public function destroy($id)
	{
		Gejalacf::find($id)->delete();
		return back();
	}
}