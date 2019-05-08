<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;

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
			'first_name' => 'bail|required|string',
			'last_name' => 'bail|required|string',
			'is_doctor' => 'bail|required|integer',
		]);
		if ($validator->fails()) {
			return response()->json($validator->errors(), 400);
		}
		$user = new User;
		$user->username = $request->username;
		$user->password = $request->password;
		$user->save();
		if ($request->is_doctor == 1) {
			$doctor = new Doctor;
			$doctor->first_name = $request->first_name;
			$doctor->last_name = $request->last_name;
			$doctor->user_id = $user->id;
			$doctor->doctor_type_id = $request->doctor_type_id;
			$doctor->save();
		}
		$patient = new Patient;
		$patient->first_name = $request->first_name;
		$patient->last_name = $request->last_name;
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
		//
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
