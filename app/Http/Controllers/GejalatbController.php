<?php

namespace App\Http\Controllers;

use App\Models\Gejalatb;
use Illuminate\Http\Request;

class GejalatbController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
		$gejalatbs = Gejalatb::orderBy('kode')->with('penyakits')->get();
		return view('dashboard.gejalatb.index', ['gejalatbs' => $gejalatbs]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$gejala = Gejalatb::orderByDesc('kode')->first();
		$last_kode = substr($gejala->kode ?? '', -3);
		$index_baru = ((int) $last_kode) + 1;

		$kode_gejala = 'G' . str_pad($index_baru, 3, '0', STR_PAD_LEFT);
		return view('dashboard.gejalatb.create', ['kode' => $kode_gejala]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
		$gejala = Gejalatb::create([
			'kode'	=> $request->kode,
			'gejala'	=> $request->gejala,
			'bobot'	=> $request->bobot,
		]);

		return redirect()->back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Gejalatb  $gejalatb
	 * @return \Illuminate\Http\Response
	 */
	public function show(Gejalatb $gejalatb)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Gejalatb  $gejalatb
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
		$gejalatb = Gejalatb::find($id);

		return view('dashboard.gejalatb.edit', ['gejala' => $gejalatb]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Gejalatb  $gejalatb
	 * @return \Illuminate\Http\Response
	 */
	public function update($id, Request $request)
	{
		//
		Gejalatb::find($id)->update($request->all());
		return redirect()->route('gejala.tb.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Gejalatb  $gejalatb
	 * @return \Illuminate\Http\Response
	 */
	public function delete($id)
	{
		Gejalatb::find($id)->delete();
		return back();
	}
}