<?php

namespace App\Http\Resources;

use App\Http\Resources\DateResource;
use App\Http\Resources\SingleDoctor;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource {
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array
	 */
	public function toArray($request) {
		return [
			"id" => $this->id,
			"first_name" => $this->first_name,
			"last_name" => $this->last_name,
			"email" => $this->email,
			"dates" => DateResource::collection($this->dates),
			"doctors" => SingleDoctor::collection($this->doctors),
		];
	}
}
