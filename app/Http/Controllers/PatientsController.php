<?php

namespace App\Http\Controllers;
use App\Http\Resources\PatientResource;

class PatientsController extends Controller {
	public function getAllDoctors($user_id, $is_doctor) {
		if ($is_doctor == 1) {
			$doctors = Doctor::where('user_id', '!=', $user_id)->get();
		} else {
			$doctors = Doctor::all();
		}
		return response()->json(PatientResource::collection($doctors));
	}
}
