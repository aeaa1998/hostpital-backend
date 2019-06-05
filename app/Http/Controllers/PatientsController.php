<?php

namespace App\Http\Controllers;
use App\Http\Resources\PatientResource;
use App\Models\Doctor;

class PatientsController extends Controller {
	public function getAllPatients($user_id, $is_doctor) {
		$doctor = Doctor::where('user_id', $user_id)->with(['patients'])->first();
		return response()->json(PatientResource::collection($doctor->patients));
	}
}
// SQLSTATE[42S22]: Column not found: 1054 Unknown column '1' in 'field list' (SQL: select `1` from `doctors` where `doctors`.`id` = user_id limit 1)
// Previous exceptions
// SQLSTATE[42S22]: Column not found: 1054 Unknown column '1' in 'field list' (42S22)
//    COPY
