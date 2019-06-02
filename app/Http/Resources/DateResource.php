<?php

namespace App\Http\Resources;

use App\Http\Resources\ReportResource;
use App\Http\Resources\SingleDoctor;
use App\Http\Resources\SinglePatientResource;
use Illuminate\Http\Resources\Json\JsonResource;

class DateResource extends JsonResource {
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array
	 */
	public function toArray($request) {
		return [
			"id" => $this->id,
			"reason" => $this->reason,
			"date" => $this->date,
			"status" => $this->status,
			"doctor_id" => $this->doctor_id,
			"patient_id" => $this->patient_id,
			"patient" => $this->when($request->is_doctor == 1, new SinglePatientResource($this->patient)),
			"doctor" => $this->when(!$request->is_doctor == 1, new SingleDoctor($this->doctor)),
			"report" => $this->when($this->status == 1, new ReportResource($this->report)),
		];
	}
}
