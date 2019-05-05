<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('doctors', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('name');
			$table->string('last_name');
			$table->unsignedBigInteger('user_id');
			$table->foreign('user_id')->references('id')->on('users');
			$table->unsignedBigInteger('doctor_type_id');
			$table->foreign('doctor_type_id')->references('id')->on('doctor_types');
			$table->double('latitud', 11, 2);
			$table->double('longitud', 11, 2);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('doctors', function (Blueprint $table) {
			$table->dropForeign(['user_id']);
			$table->dropForeign(['doctor_type_id']);
		});
		Schema::dropIfExists('doctors');
	}
}
