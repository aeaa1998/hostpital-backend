<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ReportsSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::statement('SET FOREIGN_KEY_CHECKS=0');
		DB::table('reports')->truncate();

		DB::table('reports')->insert(
			[
				['id' => 1, 'recipe' => "Este es un test de la receta de una cita. Tres gramos de paracetamol durante 80 dias habiles", 'observations' => "Este es un test de observaciones el paciente parecia un zombi", 'date_id' => 6, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

			]);
	}
}
