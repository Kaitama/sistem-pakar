<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gejalacf extends Model
{
	use HasFactory;

	protected $guarded = [];

	public function penyakits()
	{
		return $this->belongsToMany(Penyakit::class);
	}
}