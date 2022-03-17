<?php

use App\Http\Controllers\GejalacfController;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\RulebaseController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
	return view('welcome');
})->name('homepage');

Route::get('/konsultasi/cf', function () {
	return view('konsultasi.cf');
})->name('konsultasi.cf');


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

	// halaman penentuan gejala cf
	Route::get('/gejala/cf', [GejalacfController::class, 'index'])
		->name('gejala.cf.index');

	Route::get('/gejala/cf/create', [GejalacfController::class, 'create'])
		->name('gejala.cf.create');

	Route::post('/gejala/cf/store', [GejalacfController::class, 'store'])
		->name('gejala.cf.store');

	Route::get('/gejala/cf/edit/{id}', [GejalacfController::class, 'edit'])
		->name('gejala.cf.edit');

	Route::post('/gejala/cf/update/{id}', [GejalacfController::class, 'update'])
		->name('gejala.cf.update');

	Route::get('/gejala/cf/delete/{id}', [GejalacfController::class, 'delete'])
		->name('gejala.cf.delete');


	// rule base
	Route::get('/rule/cf', [RulebaseController::class, 'index'])
		->name('rule.cf.index');
	Route::post('/rule/cf/sync', [RulebaseController::class, 'sync'])
		->name('rule.cf.sync');

	// akhir dari login akses
});



require __DIR__ . '/auth.php';