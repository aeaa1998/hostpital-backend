<?php

use Illuminate\Database\Seeder;

class SchedulesSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::statement('SET FOREIGN_KEY_CHECKS=0');
		DB::table('schedules')->truncate();

		DB::table('schedules')->insert([
			['id' => 1, 'name' => 'AM Uno', 'enter_time' => '07:00:00', 'exit_time' => '12:00:00', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 2, 'name' => 'AM Dos', 'enter_time' => '07:00:00', 'exit_time' => '11:00:00', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 3, 'name' => 'AM Tres', 'enter_time' => '07:00:00', 'exit_time' => '13:00:00', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 4, 'name' => 'AM Cuatro', 'enter_time' => '07:00:00', 'exit_time' => '12:00:00', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 5, 'name' => 'AM Cinco', 'enter_time' => '14:00:00', 'exit_time' => '19:00:00', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 7, 'name' => 'PM Uno', 'enter_time' => '15:00:00', 'exit_time' => '18:00:00', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 8, 'name' => 'PM Dos', 'enter_time' => '14:00:00', 'exit_time' => '20:00:00', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 9, 'name' => 'PM Tres', 'enter_time' => '15:00:00', 'exit_time' => '21:00:00', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 10, 'name' => 'PM Cuatro', 'enter_time' => '14:00:00', 'exit_time' => '22:00:00', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 11, 'name' => 'PM Cinco', 'enter_time' => '15:00:00', 'exit_time' => '19:00:00', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
		]);
	}
}
