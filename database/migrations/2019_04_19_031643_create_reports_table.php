<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('reports', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('recipe');
			$table->string('observations')->nullable();
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
		Schema::table('reports', function (Blueprint $table) {
			$table->dropForeign(['patient_id']);
		});
		Schema::dropIfExists('reports');
	}
}
