<?php

namespace App\Http\Controllers;

use App\Models\Nilaicfuser;
use Illuminate\Http\Request;

class NilaicfuserController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
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
		Nilaicfuser::create([
			'opsi'	=> $request->opsi,
			'nilai'	=> $request->nilai,
		]);

		return back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Nilaicfuser  $nilaicfuser
	 * @return \Illuminate\Http\Response
	 */
	public function show(Nilaicfuser $nilaicfuser)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Nilaicfuser  $nilaicfuser
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Nilaicfuser $nilaicfuser)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Nilaicfuser  $nilaicfuser
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Nilaicfuser $nilaicfuser)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Nilaicfuser  $nilaicfuser
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
		Nilaicfuser::find($id)->delete();
		return back();
	}
}