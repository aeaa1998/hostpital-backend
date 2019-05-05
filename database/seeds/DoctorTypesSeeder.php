<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DoctorTypesSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::statement('SET FOREIGN_KEY_CHECKS=0');
		DB::table('doctor_types')->truncate();

		DB::table('doctor_types')->insert([
			['id' => 1, 'name' => 'Cardiologo', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 2, 'name' => 'Alergología', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 3, 'name' => 'Geriatría', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 4, 'name' => 'Hematología y hemoterapia', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 5, 'name' => 'Neurología', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 7, 'name' => 'Infectología', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 8, 'name' => 'Pediatría', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 9, 'name' => 'Psiquiatría', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 10, 'name' => 'Oftalmología', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 11, 'name' => 'Urología', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
		]);
	}
}
