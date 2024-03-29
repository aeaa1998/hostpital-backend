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
		return $this->belongsToMany('App\Models\Patient', 'doctor_patients');
	}
	public function schedule() {
		return $this->belongsTo('App\Models\Schedule');
	}
	public function dates() {
		return $this->hasMany('App\Models\Date');
	}
	public function datesAccepted() {
		return $this->dates()->where('status', 1);
	}
	public function datesPending() {
		return $this->dates()->where('status', 0);
	}

	public function validDateTimeDates($day) {
		return $this->dates()->where("status", "!=", 2)->whereDay('date', '=', $day->toDateString())->pluck('dates');
	}
	public function datesProcessed() {
		return $this->dates()->where('status', '>=', 2)->with('report');
	}

}
