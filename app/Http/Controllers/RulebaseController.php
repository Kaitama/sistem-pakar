<?php

namespace App\Http\Controllers;

use App\Models\Gejalacf;
use App\Models\Penyakit;
use Illuminate\Http\Request;

class RulebaseController extends Controller
{
	//
	public function index()
	{
		$penyakits = Penyakit::orderBy('kode')->get();
		$gejalacf = Gejalacf::orderBy('kode')->get();
		return view('dashboard.rulecf.index', ['penyakits' => $penyakits, 'gejalacf' => $gejalacf]);
	}

	public function sync(Request $request)
	{
		$penyakit = Penyakit::find($request->penyakit);

		$penyakit->gejalacfs()->sync($request->gejala);
		return back();
	}
}