<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
	use HasFactory;

	protected $guarded = [];

	// relasi many-to many ke tabel gejalacf
	public function gejalacfs()
	{
		return $this->belongsToMany(Gejalacf::class);
	}

	public function prosescfs()
	{
		return $this->belongsToMany(Prosescf::class)->withPivot('percentage');
	}

	// relasi many-to many ke tabel gejalatb
	public function gejalatbs()
	{
		return $this->belongsToMany(Gejalatb::class);
	}

	public function prosestbs()
	{
		return $this->belongsToMany(Prosestb::class)->withPivot('percentage');
	}
}