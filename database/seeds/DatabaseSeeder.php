<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run() {
		$this->call(UsersSeeder::class);
		$this->call(DoctorTypesSeeder::class);
		$this->call(MedsSeeder::class);
		$this->call(SchedulesSeeder::class);
		$this->call(DoctorsSeeder::class);
		$this->call(PatientsSeeder::class);
		$this->call(DatesSeeder::class);
	}
}
