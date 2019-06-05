<?php

namespace App\Http\Resources;

use App\Http\Resources\DoctorResource;
use App\Http\Resources\PatientResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource {
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array
	 */
	public function toArray($request) {
		return [
			'id' => $this->id,
			'last_name' => $this->patient->last_name,
			'first_name' => $this->patient->name,
			'doctor' => $this->when($request->is_doctor == 1, new DoctorResource($this->doctor)),
			'patient' => new PatientResource($this->patient),
		];
	}
}
