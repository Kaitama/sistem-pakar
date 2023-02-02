<?php

namespace App\Http\Controllers;

use App\Models\Penyakit;
use App\Models\Prosescf;
use App\Models\Prosestb;
use Illuminate\Http\Request;

class ReportcfController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
		$penyakits = Penyakit::orderBy('kode')->get();
		switch (config('app.metode')) {
			case 1:
				$reports = Prosescf::latest()->with('penyakits')->get();
				break;
			case 2:
				$reports = Prosestb::latest()->with('penyakits')->get();
				break;
			default:
				$reports = null;
				break;
		}
		return view('dashboard.reports.index', ['reports' => $reports, 'penyakits' => $penyakits]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
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
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}
}