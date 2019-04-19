<?php

namespace App\Http\Controllers;
use App\Models\Doctor;

class DoctorsController extends Controller {
	public function index() {
		return response()->json(Doctor::all());
	}
}
