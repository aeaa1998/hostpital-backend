<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FixDoctorsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('doctors', function (Blueprint $table) {
			$table->renameColumn('name', 'first_name');
			$table->renameColumn('latitud', 'latitude');
			$table->renameColumn('longitud', 'longitude');
			$table->unsignedBigInteger('schedule_id');
			$table->foreign('schedule_id')->references('id')->on('schedules');
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('doctors', function (Blueprint $table) {
			$table->renameColumn('first_name', 'name');
			$table->renameColumn('latitude', 'latitud');
			$table->renameColumn('longitude', 'longitud');

		});
	}
}
