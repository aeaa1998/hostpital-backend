<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ScheduleResource extends JsonResource {
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array
	 */
	public function toArray($request) {
		return [
			"name" => $this->name,
			"enter_time" => '2010-02-22 ' . $this->enter_time,
			"exit_time" => '2010-02-22 ' . $this->exit_time,
		];
	}
}
