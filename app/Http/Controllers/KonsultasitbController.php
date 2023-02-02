<?php

namespace App\Http\Controllers;

use App\Models\Gejalatb;
use App\Models\Penyakit;
use App\Models\Prosestb;
use Illuminate\Http\Request;

class KonsultasitbController extends Controller
{
	//
	public function index()
	{
		$gejala = Gejalatb::orderBy('kode')->get();
		return view('konsultasi.tb', ['gejala' => $gejala]);
	}

	public function proses(Request $request)
	{
		$all_data = [];
		foreach ($request->all() as $key => $value) {
			// dd($key);
			if (preg_match('/options/i', $key)) {
				$all_data[] = $value;
			}
		}

		// dd($all_data);
		// total probabilitas
		$semua_penyakit = Penyakit::orderBy('kode')->get();
		$total_probabilitas = [];
		foreach ($semua_penyakit as $penyakit) {
			$total = 0;
			foreach ($penyakit->gejalatbs as $gejala) {
				$total += $gejala->bobot;
			}
			$total_probabilitas[$penyakit->kode] = $total;
		}
		// dd($total_probabilitas);

		// probabilitas H
		$probabilitas_h = [];
		$hasil_bagi_prob = [];
		foreach ($semua_penyakit as $penyakit) {
			$total = 0;
			foreach ($penyakit->gejalatbs as $gejala) {
				$hasil_bagi = $gejala->bobot / $total_probabilitas[$penyakit->kode];
				$total += $hasil_bagi * $gejala->bobot;
				$hasil_bagi_prob[$penyakit->kode][$gejala->kode] = $hasil_bagi;
			}
			$probabilitas_h[$penyakit->kode] = $total;
		}


		$bobot_gejala_dipilih = [];
		foreach ($semua_penyakit as $penyakit) {
			foreach ($all_data as $key => $data) {
				$gejala = $penyakit->gejalatbs()->where('id', $data)->first();
				if ($gejala) {
					$bobot_gejala_dipilih[$penyakit->kode][$gejala->kode] = $gejala->bobot;
				}
			}
		}


		$kesimpulan_studikasus = [];
		foreach ($bobot_gejala_dipilih as $kode_penyakit => $gejala_dipilih) {
			$sum = 0;
			foreach ($gejala_dipilih as $kode_gejala => $bobot) {
				$sum += ($bobot * $hasil_bagi_prob[$kode_penyakit][$kode_gejala] / $probabilitas_h[$kode_penyakit]) * $bobot;
				# code...
			}
			$kesimpulan_studikasus[$kode_penyakit] = $sum;
		}
		// dd($kesimpulan_studikasus);

		arsort($kesimpulan_studikasus);

		// simpan data ke database
		$proses = Prosestb::create([
			'name'	=> $request->name,
			'email'	=> $request->email,
			'phone'	=> $request->phone,
			'address'	=> $request->address,
		]);
		foreach ($kesimpulan_studikasus as $k => $hasil) {
			$penyakit = Penyakit::where('kode', $k)->first();
			if ($hasil > 0) {
				$hasil_akhir[] = [
					'penyakit'	=> $penyakit->penyakit,
					'nilai'			=> number_format($hasil * 100, 2, ',', '.'),
					'solusi'		=> $penyakit->solusi,
				];
			}
			$proses->penyakits()->attach($penyakit, ['percentage' => $hasil]);
		}

		return view('konsultasi.hasil', ['hasil' => $hasil_akhir, 'pasien' => $proses]);
	}
}