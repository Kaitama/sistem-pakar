<?php

use App\Http\Controllers\GejalacfController;
use App\Http\Controllers\GejalatbController;
use App\Http\Controllers\KonsultasicfController;
use App\Http\Controllers\KonsultasitbController;
use App\Http\Controllers\NilaicfuserController;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\ReportcfController;
use App\Http\Controllers\RulebaseController;
use App\Http\Controllers\RulebasetbController;
use App\Models\Nilaicfuser;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
	return view('halaman-depan');
})->name('homepage');

/**
 * Route Konsultasi CF
 */
Route::get('/konsultasi/cf', [KonsultasicfController::class, 'index'])->name('konsultasi.cf');
Route::post('/konsultasi/cf/proses', [KonsultasicfController::class, 'proses'])->name('konsultasi.cf.proses');

/**
 * Route Konsultasi TB
 */
Route::get('/konsultasi/tb', [KonsultasitbController::class, 'index'])->name('konsultasi.tb');
Route::post('/konsultasi/tb/proses', [KonsultasitbController::class, 'proses'])->name('konsultasi.tb.proses');


// bagian route khusus untuk akses yang sudah login
Route::middleware(['auth'])->prefix('dashboard')->group(function () {
	// halaman dashboard
	Route::get('/', function () {
		return view('dashboard');
	})->name('dashboard');

	// halaman penyakit
	Route::get('/penyakit', [PenyakitController::class, 'index'])
		->name('penyakit.index');

	Route::get('/penyakit/create', [PenyakitController::class, 'create'])
		->name('penyakit.create');

	Route::post('/penyakit/store', [PenyakitController::class, 'store'])
		->name('penyakit.store');

	Route::get('/penyakit/edit/{id}', [PenyakitController::class, 'edit'])
		->name('penyakit.edit');

	Route::post('/penyakit/update/{id}', [PenyakitController::class, 'update'])
		->name('penyakit.update');

	Route::get('/penyakit/delete/{id}', [PenyakitController::class, 'destroy'])
		->name('penyakit.delete');

	/**
	 * Route Metode Certainty Factor
	 */
	Route::prefix('cf')->group(function () {
		// halaman penentuan gejala cf
		Route::get('/gejala', [GejalacfController::class, 'index'])
			->name('gejala.cf.index');

		Route::get('/gejala/create', [GejalacfController::class, 'create'])
			->name('gejala.cf.create');

		Route::post('/gejala/store', [GejalacfController::class, 'store'])
			->name('gejala.cf.store');

		Route::get('/gejala/edit/{id}', [GejalacfController::class, 'edit'])
			->name('gejala.cf.edit');

		Route::post('/gejala/update/{id}', [GejalacfController::class, 'update'])
			->name('gejala.cf.update');

		Route::get('/gejala/delete/{id}', [GejalacfController::class, 'delete'])
			->name('gejala.cf.delete');

		// rule base cf
		Route::get('/rule', [RulebaseController::class, 'index'])
			->name('rule.cf.index');
		Route::post('/rule/sync', [RulebaseController::class, 'sync'])
			->name('rule.cf.sync');
		Route::post('/rule/cfuser/store', [NilaicfuserController::class, 'store'])
			->name('cfuser.store');
		Route::get('/rule/cfuser/delete/{id}', [NilaicfuserController::class, 'destroy'])
			->name('cfuser.delete');
	});

	/**
	 * Route Metode Teorema Bayes
	 */
	Route::prefix('tb')->group(function () {
		// halaman penentuan gejala tb
		Route::get('/gejala', [GejalatbController::class, 'index'])
			->name('gejala.tb.index');

		Route::get('/gejala/create', [GejalatbController::class, 'create'])
			->name('gejala.tb.create');

		Route::post('/gejala/store', [GejalatbController::class, 'store'])
			->name('gejala.tb.store');

		Route::get('/gejala/edit/{id}', [GejalatbController::class, 'edit'])
			->name('gejala.tb.edit');

		Route::post('/gejala/update/{id}', [GejalatbController::class, 'update'])
			->name('gejala.tb.update');

		Route::get('/gejala/delete/{id}', [GejalatbController::class, 'delete'])
			->name('gejala.tb.delete');

		// rule base tb
		Route::get('/rule', [RulebasetbController::class, 'index'])
			->name('rule.tb.index');
		Route::post('/rule/sync', [RulebasetbController::class, 'sync'])
			->name('rule.tb.sync');
	});





	// reports
	Route::get('/report', [ReportcfController::class, 'index'])
		->name('reports.index');

	// akhir dari login akses
});



require __DIR__ . '/auth.php';