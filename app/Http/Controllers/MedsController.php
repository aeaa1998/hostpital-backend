<?php

namespace App\Http\Controllers;

use App\Models\Med;
use Illuminate\Http\Request;

class MedsController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return response()->json(Med::all());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		standardValidationMeds($request);
		$med = new Med();
		$med->name = $request->name;
		$med->amount = $request->amount;
		$med->price = $request->price;
		$med->save();
		return response()->json($med);
	}

	public function standardValidationMeds($request) {
		$validator = Validator::make($request->all(), [
			'name' => 'bail|required|string',
			'amount' => 'bail|required|integer',
			'price' => 'bail|required|string|double',
		]);
		if ($validator->fails()) {
			return response()->json($validator->errors(), 400);
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		return response()->json(Med::find($id));
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
		$med = Med::find($id);
		$med->update(request()->all());
		return response()->json($med);

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
