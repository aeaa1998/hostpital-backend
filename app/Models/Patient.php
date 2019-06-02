<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model {
	protected $guarded = ['id'];
	public function meds() {
		return $this->belongsToMany('App\Models\Med', 'med_patients');
	}
	public function doctors() {
		return $this->belongsToMany('App\Models\Doctor');
	}
	public function user() {
		return $this->belongsTo('App\Models\DoctorUser', 'user_id');
	}
	public function dates() {
		return $this->hasMany('App\Models\Date');
	}
	public function datesAccepted() {
		return $this->dates()->where('status', 1);
	}
	public function validDateTimeDates($day) {
		return $this->dates()->where("status", "!=", 2)->whereDay('date', '=', $day->toDateString())->pluck('dates');
	}
}
