<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PatientsSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::statement('SET FOREIGN_KEY_CHECKS=0');
		DB::table('patients')->truncate();

		DB::table('patients')->insert([
			['id' => 1, 'first_name' => 'Hsing Li', 'last_name' => "Chang Ascencio", 'user_id' => 1, 'email' => 'augustoalonso98@gmail.com', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 2, 'first_name' => 'Hsing Huei', 'last_name' => "Chang Ascencio", 'user_id' => 2, 'email' => 'augustoalonso98@gmail.com', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 3, 'first_name' => 'Augusto Alonso', 'last_name' => "Alonso Ascencio", 'user_id' => 3, 'email' => 'augustoalonso98@gmail.com', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 4, 'first_name' => 'Michael Chan', 'last_name' => "Chan Chan", 'user_id' => 4, 'email' => 'augustoalonso98@gmail.com', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 5, 'first_name' => 'Dr Simi', 'last_name' => "Galeno Batres", 'user_id' => 5, 'email' => 'augustoalonso98@gmail.com', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 6, 'first_name' => 'Dr Dre', 'last_name' => "Mathers Lamar", 'user_id' => 6, 'email' => 'augustoalonso98@gmail.com', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 7, 'first_name' => 'Hsing Li Paciente', 'last_name' => "Chang Ascencio", 'user_id' => 7, 'email' => 'augustoalonso98@gmail.com', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 8, 'first_name' => 'Hsing Huei Paciente', 'last_name' => "Chang Ascencio", 'user_id' => 8, 'email' => 'augustoalonso98@gmail.com', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 9, 'first_name' => 'Augusto Alonso Paciente', 'last_name' => "Alonso Ascencio", 'user_id' => 9, 'email' => 'augustoalonso98@gmail.com', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['id' => 10, 'first_name' => 'Paciente', 'last_name' => "Chan Chan", 'user_id' => 10, 'email' => 'hsingli@schoolbuzz.com.gt', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

		]);
	}
}
