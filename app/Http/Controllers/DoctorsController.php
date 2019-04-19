<?php

namespace App\Http\Controllers;
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
}
