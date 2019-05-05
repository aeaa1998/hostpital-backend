<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SingleDoctor extends JsonResource {
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array
	 */
	public function toArray($request) {
		return [
			"id" => $this->id,
			"name" => $this->name,
			"last_name" => $this->last_name,
			"doctor_type" => new DoctorTypeResource($this->doctorType),
			"schedules" => ScheduleResource::collection($this->schedules),
		];
	}
}
