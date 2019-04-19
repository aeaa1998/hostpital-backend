<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAsistentsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('assistent_users', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('email')->unique();
			$table->string('password');
			$table->unsignedBigInteger('doctor_id');
			$table->foreign('doctor_id')->references('id')->on('doctors');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('assistent_users', function (Blueprint $table) {
			$table->dropForeign(['doctor_id']);
		});
		Schema::dropIfExists('assistent_users');
	}
}
