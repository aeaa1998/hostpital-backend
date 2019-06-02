<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::statement('SET FOREIGN_KEY_CHECKS=0');
		DB::table('users')->truncate();

		DB::table('users')->insert([
			['id' => 1, 'email' => 'doctor1@gmail.com', 'password' => bcrypt('123'), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 2, 'email' => 'doctor2@gmail.com', 'password' => bcrypt('123'), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 3, 'email' => 'doctor3@gmail.com', 'password' => bcrypt('123'), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 4, 'email' => 'doctor4@gmail.com', 'password' => bcrypt('123'), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 5, 'email' => 'doctor5@gmail.com', 'password' => bcrypt('123'), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 6, 'email' => 'doctor6@gmail.com', 'password' => bcrypt('123'), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 7, 'email' => 'patient1@gmail.com', 'password' => bcrypt('123'), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 8, 'email' => 'patient2@gmail.com', 'password' => bcrypt('123'), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 9, 'email' => 'patient3@gmail.com', 'password' => bcrypt('123'), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 10, 'email' => 'patient4@gmail.com', 'password' => bcrypt('123'), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
		]);
	}
}
