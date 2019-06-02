<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MedsSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::statement('SET FOREIGN_KEY_CHECKS=0');
		DB::table('meds')->truncate();

		DB::table('meds')->insert([
			['id' => 1, 'name' => 'Paracetamol', 'amount' => 10, 'price' => 12.00, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 2, 'name' => 'Diclofenaco', 'amount' => 10, 'price' => 122.00, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 3, 'name' => 'Aspirina Bayer', 'amount' => 10, 'price' => 212.00, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 4, 'name' => 'Tabcin', 'amount' => 10, 'price' => 121.00, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 5, 'name' => 'Loratadina', 'amount' => 10, 'price' => 312.00, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 7, 'name' => 'Sterimar', 'amount' => 10, 'price' => 122.00, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 8, 'name' => 'Pedialyte', 'amount' => 10, 'price' => 14.00, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 9, 'name' => 'Vic', 'amount' => 10, 'price' => 121.00, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 10, 'name' => 'Novophane', 'amount' => 10, 'price' => 112.00, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 11, 'name' => 'Corentel 5', 'amount' => 10, 'price' => 212.00, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
		]);
	}
}
