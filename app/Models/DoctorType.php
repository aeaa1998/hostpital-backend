<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorType extends Model {
	protected $guarded = ['id'];
	public function doctors() {
		return $this->hasMany('App\Models\Doctor');
	}

	public function patitentsByDoctorType() {
		return $this->doctors()->map(function ($doctor, $key) {
			return $doctor->patients;
		});
	}

}
