<?php

use Carbon\Carbon;
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
			['id' => 1, 'name' => 'Horario Uno', 'enter_time' => '07:00:00', 'exit_time' => '18:00:00', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 2, 'name' => 'Horario Dos', 'enter_time' => '07:00:00', 'exit_time' => '17:00:00', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 3, 'name' => 'Horario Tres', 'enter_time' => '07:00:00', 'exit_time' => '15:00:00', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 4, 'name' => 'Horario Cuatro', 'enter_time' => '07:00:00', 'exit_time' => '16:00:00', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 5, 'name' => 'Horario Cinco', 'enter_time' => '14:00:00', 'exit_time' => '19:00:00', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 7, 'name' => 'Horario Seis', 'enter_time' => '15:00:00', 'exit_time' => '18:00:00', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 8, 'name' => 'Horario Siete', 'enter_time' => '14:00:00', 'exit_time' => '20:00:00', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 9, 'name' => 'Horario Ocho', 'enter_time' => '15:00:00', 'exit_time' => '21:00:00', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 10, 'name' => 'Horario Nueve', 'enter_time' => '14:00:00', 'exit_time' => '22:00:00', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 11, 'name' => 'Horario Diez', 'enter_time' => '15:00:00', 'exit_time' => '19:00:00', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
		]);
	}
}
