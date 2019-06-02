<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatesSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::statement('SET FOREIGN_KEY_CHECKS=0');
		DB::table('dates')->truncate();

		DB::table('dates')->insert(
			[
				['id' => 1, 'reason' => 'Reason Test', 'date' => Carbon::now(), 'status' => 1, 'doctor_id' => 1, 'patient_id' => 6, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
				['id' => 2, 'reason' => 'Reason Test', 'date' => Carbon::now(), 'status' => 1, 'doctor_id' => 1, 'patient_id' => 6, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

			]);
	}
}
