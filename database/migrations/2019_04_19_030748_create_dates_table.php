<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('dates', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('reason');
			$table->datetime('date');
			$table->integer('status');
			$table->unsignedBigInteger('doctor_id');
			$table->foreign('doctor_id')->references('id')->on('doctors');
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
		Schema::table('dates', function (Blueprint $table) {
			$table->dropForeign(['doctor_id']);
			$table->dropForeign(['patient_id']);
		});
		Schema::dropIfExists('dates');
	}
}
