<?php

namespace App\Http\Controllers;

use App\Http\Resources\DateResource;
use App\Mail\ReportMailable;
use App\Models\Date;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Report;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Validator;

class DatesController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//
	}

	public function datesByUser($user_id, $isDoctor) {
		if ($isDoctor == 1) {
			$doctor = Doctor::where('user_id', $user_id)->with('dates')->first();
			$dates = $doctor->datesAccepted;
			Session::put('is_doctor', 1);
		} else {
			$patient = Patient::where('user_id', $user_id)->with('dates')->first();
			$dates = $patient->datesAccepted;
		}
		// dd($dates);
		return response()->json(DateResource::collection($dates));
	}

	public function allProcesedDates($user_id, $is_doctor) {
		if ($is_doctor == 1) {
			$doctor = Doctor::where('user_id', $user_id)->with('dates')->first();
			$dates = $doctor->datesProcessed;
			Session::put('is_doctor', 1);
		} else {
			$patient = Patient::where('user_id', $user_id)->with('dates')->first();
			$dates = $patient->datesProcessed;
		}
		return response()->json(DateResource::collection($dates));
	}
	public function datesPending($user_id, $is_doctor) {
		$doctor = Doctor::where('user_id', $user_id)->with('dates')->first();
		$dates = $doctor->datesPending;
		Session::put('is_doctor', 1);

		return response()->json(DateResource::collection($dates));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	public function checkIsAvailable($doctor_id, $patient_id, $day) {

	}

	// $availableSchedules = $doctor->schedules->filter(function($schedule, $key) use ($doctorDates, $patientDates){
	//     $period = CarbonPeriod::create($schedule->enter_time, '1 hour' ,$schedule->exit_time);
	//     $period = $period->filter(function($time){
	//         return $time->greaterThan(Carbon::now()->addHours(3));
	//     });
	//     foreach ($doctorDates as $dd) {
	//         $period = $period->filter(function($time) use ($dd){
	//             if ($time->notEqualTo($dd)) {
	//                 return $time
	//             }
	//         })->values();
	//     }
	//     foreach ($patientDates as $pd) {
	//         $period = $period->filter(function($time) use ($pd){
	//             if ($time->notEqualTo($pd)) {
	//                 return $time
	//             }
	//         })->values();
	//     }
	//     if (!empty($period->toArray())) {
	//         return $period->toArray();
	//     }
	// })->values();
	// $availableSchedules = $availableSchedules->toArray();
	// $merged = array_merge(...$availableSchedules);
	// return response()->json($merged);

	// }
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$validator = Validator::make($request->all(), [
			'patient_id' => 'bail|sometimes|required|integer',
			'doctor_id' => 'bail|sometimes|required|integer',
			'date' => 'bail|required',
			'is_doctor' => 'bail|required|int',
			'reason' => 'bail|required|string',
		]);
		if ($validator->fails()) {
			return response()->json($validator->errors(), 400);
		}
		$dateC = Date::where('doctor_id', $request->doctor_id)
			->where('patient_id', $request->patient_id)
			->where('status', '<', 2)
			->whereDate('date', Carbon::parse($request->date))
			->whereTime('date', Carbon::parse($request->date))
			->get();

		if (!$dateC->isEmpty()) {
			return response(["message" => "Esa fecha ya tiene cita o para el doctor"], 500);
		}
		$date = new Date();
		$date->patient_id = $request->patient_id;
		$date->doctor_id = $request->doctor_id;
		$date->status = ($request->is_doctor == 1) ? 1 : 0;
		$date->date = $request->date;
		$date->reason = $request->reason;
		$date->save();
		return response()->json(new DateResource($date));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$date = Date::find($id);
		return response()->json(new DateResource($date));
	}

	public function showAllDatesByUser() {
		// $id = (Session::has('is_doctor')) ? Session::get('doctor_id') : b ;

	}
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
		$date = Date::find($id);
		if ($request->status == 3) {
			Report::insert([
				['recipe' => $request->recipe, 'observations' => $request->observations, 'date_id' => $id],
			]);
			$patient = Patient::where('id', $date->patient_id)->first();
			Mail::to([$patient->email])->send(new ReportMailable($request->recipe, $request->observations));

		}
		$date->status = $request->status;
		$date->save();
		return response()->json(new DateResource($date));
	}
//0 pendiente
	//1 aceptada
	//2 rechazada
	//3hecha
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
