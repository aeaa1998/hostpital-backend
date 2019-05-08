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
			$table->double('latitude')->nullable()->change();
			$table->double('longitude')->nullable()->change();
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
			$table->double('latitud')->change();
			$table->double('longitud')->change();
		});
	}
}
