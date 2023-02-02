<?php

namespace App\Http\Controllers;

use App\Models\Gejalatb;
use App\Models\Penyakit;
use Illuminate\Http\Request;

class RulebasetbController extends Controller
{
	//
	public function index()
	{
		$penyakits = Penyakit::orderBy('kode')->get();
		$gejalas = Gejalatb::orderBy('kode')->get();

		return view('dashboard.ruletb.index', ['penyakits' => $penyakits, 'gejalas' => $gejalas]);
	}

	public function sync(Request $request)
	{
		$penyakit = Penyakit::find($request->penyakit);

		$penyakit->gejalatbs()->sync($request->gejala);
		return back();
	}
}