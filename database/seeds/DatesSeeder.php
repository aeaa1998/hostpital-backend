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
				['id' => 1, 'reason' => 'Reason Test', 'date' => Carbon::now()->addDay(), 'status' => 1, 'doctor_id' => 1, 'patient_id' => 6, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
				['id' => 2, 'reason' => 'Reason Test', 'date' => Carbon::now()->addDays(2), 'status' => 1, 'doctor_id' => 1, 'patient_id' => 6, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
				['id' => 3, 'reason' => 'Reason Test Pending 1', 'date' => Carbon::now()->addDay(), 'status' => 0, 'doctor_id' => 1, 'patient_id' => 10, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
				['id' => 4, 'reason' => 'Reason Test Pending 2', 'date' => Carbon::now()->addDay(), 'status' => 0, 'doctor_id' => 1, 'patient_id' => 6, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
				['id' => 5, 'reason' => 'Reason Test Rejected 2', 'date' => Carbon::now()->subDay(), 'status' => 2, 'doctor_id' => 1, 'patient_id' => 10, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
				['id' => 6, 'reason' => 'Reason Test Processed 2', 'date' => Carbon::now()->subDay(), 'status' => 3, 'doctor_id' => 1, 'patient_id' => 6, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

			]);
		DB::table('doctor_patients')->truncate();

		DB::table('doctor_patients')->insert(
			[
				['doctor_id' => 1, 'patient_id' => 6, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
				['doctor_id' => 1, 'patient_id' => 10, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

			]);
	}
}
