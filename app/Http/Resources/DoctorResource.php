<?php

namespace App\Http\Resources;

use App\Http\Resources\DateResource;
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
			'first_name' => $this->first_name,
			'last_name' => $this->last_name,
			"doctor_type" => new DoctorTypeResource($this->doctorType),
			"dates" => DateResource::collection($this->dates),
			"patients" => SinglePatientResource::collection($this->patients),
			"schedule" => new ScheduleResource($this->schedule),
		];
	}
}
