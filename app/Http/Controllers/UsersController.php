<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\Doctor;
use App\Models\DoctorType;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;

class UsersController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$validator = Validator::make($request->all(), [
			'username' => 'bail|required|string',
			'password' => 'bail|required|string',
			'email' => 'bail|required|string',
			'first_name' => 'bail|required|string',
			'last_name' => 'bail|required|string',
			'is_doctor' => 'bail|required|integer',
		]);
		if ($validator->fails()) {
			return response()->json($validator->errors(), 400);
		}
		if (!User::where('email', $request->username)->get()->isEmpty()) {
			return response(["message" => "Ya existe"], 500);
		}
		$user = new User;
		$user->username = $request->username;
		$user->password = bcrypt($request->password);
		$user->save();
		if ($request->is_doctor == 1) {
			$doctor = new Doctor;
			$doctor->first_name = $request->first_name;
			$doctor->last_name = $request->last_name;
			$doctor->user_id = $user->id;
			$doctorType = DoctorType::where('name', $request->doctor_type)->get();
			if ($doctorType->isEmpty()) {
				$doctorType = new DoctorType;
				$doctorType->name = $request->doctor_type;
				$doctorType->save();
			}
			$doctor->doctor_type_id = $doctorType->id;
			$doctor->save();
		}
		$patient = new Patient;
		$patient->first_name = $request->first_name;
		$patient->last_name = $request->last_name;
		$patient->email = $request->email;
		$patient->user_id = $user->id;
		$patient->save();
		$userResource = new UserResource($user);
		return response()->json($userResource);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		if ($request->new_password != "") {
			$user = User::find($id)->with(['doctor', 'patient'])->first();
			$user->password = bcrypt($request->new_password);
			$user->save();
		} else if ($request->new_username != "") {
			$user = User::find($id)->with(['doctor', 'patient'])->first();
			$user->username = $request->new_username;
			$user->save();
		} else if ($request->new_name != "") {
			$patient = Patient::where('user_id', $id)->first();
			$doctor = Doctor::where('user_id', $id)->first();
			$patient->first_name = $request->new_name;
			$patient->save();
			if ($request->is_doctor == 1) {
				$doctor->first_name = $request->new_name;
				$doctor->save();
			}
			$user = User::find($id)->with(['doctor', 'patient'])->first();
		} else if ($request->new_last_name != "") {
			$patient = Patient::where('user_id', $id)->first();
			$doctor = Doctor::where('user_id', $id)->first();
			$patient->last_name = $request->new_last_name;
			$patient->save();
			if ($request->is_doctor == 1) {
				$doctor->last_name = $request->new_last_name;
				$doctor->save();
			}
			$user = User::find($id)->with(['doctor', 'patient'])->first();
		}
		$userResource = new UserResource($user);
		return response()->json($userResource);

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
	}
}
