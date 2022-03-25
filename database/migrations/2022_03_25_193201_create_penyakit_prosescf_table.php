<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('penyakit_prosescf', function (Blueprint $table) {
			$table->integer('penyakit_id');
			$table->integer('prosescf_id');
			$table->float('percentage', 8, 3);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('penyakit_prosescf');
	}
};