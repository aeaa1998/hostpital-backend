<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Date extends Model {
	protected $guarded = ['id'];

	public function doctor() {
		return $this->belongsTo('App\Models\Doctor');
	}
	public function patient() {
		return $this->belongsTo('App\Models\Patient');
	}
	public function requests() {
		return $this->hasMany('App\Models\Date');
	}
	public function report(){
		return $this->hasOne('App\Models\Report')
	}

}
