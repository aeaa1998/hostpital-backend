<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedPatientsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('med_patients', function (Blueprint $table) {
			$table->unsignedBigInteger('med_id');
			$table->foreign('med_id')->references('id')->on('meds');
			$table->unsignedBigInteger('patient_id');
			$table->foreign('patient_id')->references('id')->on('patients');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('med_patients', function (Blueprint $table) {
			$table->dropForeign(['patient_id']);
			$table->dropForeign(['med_id']);
		});
		Schema::dropIfExists('med_patients');
	}
}
