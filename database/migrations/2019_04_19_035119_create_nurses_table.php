<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNursesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('nurses', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->unsignedBigInteger('category_id');
			$table->foreign('category_id')->references('id')->on('doctor_types');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('nurses', function (Blueprint $table) {
			$table->dropForeign(['category_id']);
		});
		Schema::dropIfExists('nurses');
	}
}
