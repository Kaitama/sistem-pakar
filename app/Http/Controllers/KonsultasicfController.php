<?php

namespace App\Http\Controllers;

use App\Models\Gejalacf;
use App\Models\Nilaicfuser;
use App\Models\Penyakit;
use Illuminate\Http\Request;

class KonsultasicfController extends Controller
{
	//

	public function index()
	{
		$cfusers = Nilaicfuser::orderByDesc('nilai')->get();
		$gejala = Gejalacf::orderBy('kode')->get();
		return view('konsultasi.cf', ['gejala' => $gejala, 'cfusers' => $cfusers]);
	}

	public function proses(Request $request)
	{
		$all_data = $request->all();
		unset($all_data['_token']);

		// susun id gejala => id opsi jawaban
		$cfuser = [];
		foreach ($all_data as $l => $v) {
			$x = explode('-', $v);
			$cfuser[$x[0]] = $x[1];
		}

		// dd($cfuser);
		// cf kombinasi
		$all_gejala = Gejalacf::all();
		$cf_kombinasi = [];
		foreach ($all_gejala as $k => $gej) {
			$nilai_cf_user = Nilaicfuser::find($cfuser[$gej->id])->nilai;
			$cf_kombinasi[$gej->id] = $nilai_cf_user * $gej->bobot;
		}
		// dd($cf_kombinasi);

		// get penyakit
		$arr_hasil = [];
		$penyakits = Penyakit::with('gejalacfs')->get();
		foreach ($penyakits as $key => $peny) {
			$cf_old = 0;
			foreach ($peny->gejalacfs as $k => $g) {
				if ($k == 0) {
					$cf_old = $cf_kombinasi[$g->id];
				} else {
					$cf_old = $cf_old + $cf_kombinasi[$g->id] - ($cf_old * $cf_kombinasi[$g->id]);
				}
				if ($k == $peny->gejalacfs->count() - 1) {
					break;
				}
			}
			$arr_hasil[$peny->id] = $cf_old;
		}

		$hasil_akhir = [];
		// dd($arr_hasil);
		arsort($arr_hasil);
		foreach ($arr_hasil as $k => $hasil) {
			if ($hasil > 0) {
				$penyakit = Penyakit::find($k);
				$hasil_akhir[] = [
					'penyakit'	=> $penyakit->penyakit,
					'nilai'			=> number_format($hasil * 100, 2, ',', '.'),
					'solusi'		=> $penyakit->solusi,
				];
			}
		}
		// dd($hasil_akhir);
		return view('konsultasi.cf-hasil', ['hasil' => $hasil_akhir]);
	}
}