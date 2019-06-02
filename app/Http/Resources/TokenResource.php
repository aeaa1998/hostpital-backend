<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TokenResource extends JsonResource {
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array
	 */
	public function toArray($request) {
		return [
			"id" => $this->id,
			"doctor_id" => $this->doctor->id,
			"patient_id" => $this->patient->id,
			"first_name" => $this->patient->first_name,
			"last_name" => $this->patient->last_name,
			"access_token" => $this->access_token,
			"is_doctor" => $this->when(session()->has('is_doctor'), 1),
		];
	}
}
