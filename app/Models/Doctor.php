<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model {
	public function doctorUser() {
		return $this->belongsTo('App\Models\DoctorUser', 'user_id');
	}
	public function doctorType() {
		return $this->belongsTo('App\Models\DoctorType');
	}
}
