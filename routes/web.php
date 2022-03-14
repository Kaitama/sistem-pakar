<?php

use App\Http\Controllers\PenyakitController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
	return view('welcome');
});


// bagian route khusus untuk akses yang sudah login
Route::middleware(['auth'])->group(function () {
	// halaman dashboard
	Route::get('/dashboard', function () {
		return view('dashboard');
	})->name('dashboard');

	// halaman penyakit
	Route::get('/dashboard/penyakit', [PenyakitController::class, 'index'])
		->name('penyakit.index');

	Route::get('/dashboard/penyakit/create', [PenyakitController::class, 'create'])
		->name('penyakit.create');

	Route::post('/dashboard/penyakit/store', [PenyakitController::class, 'store'])
		->name('penyakit.store');




	// akhir dari login akses
});



require __DIR__ . '/auth.php';