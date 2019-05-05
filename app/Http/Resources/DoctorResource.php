<?php

namespace App\Http\Resources;

use App\Http\Resources\DatesResource;
use App\Http\Resources\DoctorTypeResource;
use App\Http\Resources\ScheduleResource;
use App\Http\Resources\SinglePatientResource;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorResource extends JsonResource {
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array
	 */
	public function toArray($request) {
		return [
			"id" => $this->id,
			"doctor_type" => new DoctorTypeResource($this->doctorType),
			"dates" => DatesResource::collection($this->dates),
			"patients" => SinglePatientResource::collection($this->patients),
			"schedules" => ScheduleResource::collection($this->schedules),
		];
	}
}
