<?php

namespace App\Http\Controllers;

use App\Http\Resources\DateResource;
use App\Models\Date;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DatesController extends Controller {
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
		//
	}

    public function getAvialableHours($request, $doctor_id, $patient_id, $date){
        $date = Carbon::parse($date);
        $createCarbon = function($date){
            return Carbon::parse($date);
        }
        $doctor = Doctor::find($doctor_id);
        $doctorDates = array_map($createCarbon, $doctor->validDateTimeDates($date));
        $patientDates = array_map($createCarbon , $doctor->validDateTimeDates($date));
        $availableSchedules = $doctor->schedules->filter(function($schedule, $key) use ($doctorDates, $patientDates){
            $period = CarbonPeriod::create($schedule->enter_time, '1 hour' ,$schedule->exit_time);
            $period = $period->filter(function($time){
                return $time->greaterThan(Carbon::now()->addHours(3));
            });
            foreach ($doctorDates as $dd) {
                $period = $period->filter(function($time) use ($dd){
                    if ($time->notEqualTo($dd)) {
                        return $time                    
                    }
                })->values();
            }
            foreach ($patientDates as $pd) {
                $period = $period->filter(function($time) use ($pd){
                    if ($time->notEqualTo($pd)) {
                        return $time                    
                    }
                })->values();
            }
            if (!empty($period->toArray())) {
                return $period->toArray();
            }
        })->values();
        $availableSchedules = $availableSchedules->toArray();
        $merged = array_merge(...$availableSchedules);
        return response()->json($merged);

    }
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		standardValidationDates($request);
        $session = $request->session();
        $date = new Date();
        if (!$session->has('is_doctor')) {
            $date->doctor_id = $session->get('user_id');
            $date->patient_id = $request->patient_id;
            $date->status = 1
		} else {
            $date->patient_id = $session->get('user_id');
            $date->doctor_id = $request->doctor_id;
            $date->status = 0;
        }
        $date->reason = $request->reason;
        $date->save();
        return response()->json(new DateResource($date));
	}

    public function standardValidationDates($request){
        $validator = Validator::make($request->all(), [
            'patient_id' => 'bail|sometimes|required|integer',
            'doctor_id' => 'bail|sometimes|required|integer',
            'date' => 'bail|required',
            'reason' => 'bail|required|string',
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
		$date = Date::find($id);
		return response()->json(new DateResource($date));
	}

	public function showAllDatesByPatient($patient_id) {

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
	public function update($id) {
		$date = Date::find($id);
        $date->update(request()->all());
        return response()->json(new DateResource($date));
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
