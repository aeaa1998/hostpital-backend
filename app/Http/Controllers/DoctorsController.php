<?php

namespace App\Http\Controllers;
use App\Http\Resources\DoctorResource;
use App\Http\Resources\SingleDoctor;
use App\Models\Doctor;

class DoctorsController extends Controller {
	public function index() {
		$doctors = Doctor::all();
		return response()->json($doctors);
	}

	public function show($id) {
		$doctor = Doctor::find($id);
		return response()->json($doctor);
	}

	public function getAllDoctors($user_id, $is_doctor) {
		if ($is_doctor == 1) {
			$doctors = Doctor::where('user_id', '!=', $user_id)->get();
		} else {
			$doctors = Doctor::all();
		}
		return response()->json(DoctorResource::collection($doctors));
	}

	public function showByType($doctor_type) {
		$sessionDoctorId = $request->session()->get('doctor_id', 0);
		$doctors = Doctor::where('doctor_type', $doctor_type)->where('id', '!=', $doctor_id)->get();
		$doctorResource = SingleDoctor::collection($doctors);
		return response()->json($doctorResource);
	}

}
