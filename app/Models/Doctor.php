<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model {
	protected $guarded = ['id'];

	public function user() {
		return $this->belongsTo('App\Models\DoctorUser', 'user_id');
	}
	public function doctorType() {
		return $this->belongsTo('App\Models\DoctorType');
	}
	public function patients() {
		return $this->belongsToMany('App\Models\DoctorType', 'doctor_patients');
	}
	public function schedules() {
		return $this->belongsToMany('App\Models\Schedule', 'doctor_schedules');
	}
	public function dates() {
		return $this->hasMany('App\Models\Date');
	}

	public function validDateTimeDates($day) {
		return $this->dates()->where("status", "!=", 2)->whereDay('date', '=', $day->toDateString())->pluck('dates');
	}

}
