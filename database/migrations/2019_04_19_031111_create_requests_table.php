<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('requests', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->datetime('new_date');
			$table->string('new_reason')->nullable();
			$table->string('reason');
			$table->unsignedBigInteger('date_id');
			$table->foreign('date_id')->references('id')->on('dates');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('requests', function (Blueprint $table) {
			$table->dropForeign(['date_id']);
		});
		Schema::dropIfExists('requests');
	}
}
