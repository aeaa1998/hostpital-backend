<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DoctorsSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::statement('SET FOREIGN_KEY_CHECKS=0');
		DB::table('doctors')->truncate();

		DB::table('doctors')->insert([
			['id' => 1, 'first_name' => 'Hsing Li', 'last_name' => "Chang Ascencio", 'user_id' => 1, 'doctor_type_id' => 1, 'schedule_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 2, 'first_name' => 'Hsing Huei', 'last_name' => "Chang Ascencio", 'user_id' => 2, 'doctor_type_id' => 2, 'schedule_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 3, 'first_name' => 'Augusto Alonso', 'last_name' => "Alonso Ascencio", 'user_id' => 3, 'doctor_type_id' => 3, 'schedule_id' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 4, 'first_name' => 'Michael Chan', 'last_name' => "Chan Chan", 'user_id' => 4, 'doctor_type_id' => 4, 'schedule_id' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 5, 'first_name' => 'Dr Simi', 'last_name' => "Galeno Batres", 'user_id' => 5, 'doctor_type_id' => 6, 'schedule_id' => 7, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 6, 'first_name' => 'Dr Dre', 'last_name' => "Mathers Lamar", 'user_id' => 6, 'doctor_type_id' => 7, 'schedule_id' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
		]);
	}
}
