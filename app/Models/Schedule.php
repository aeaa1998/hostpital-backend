<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model {
	protected $guarded = ['id'];
	public function doctors(){
		return $this->belongsToMany('App\Models\Doctor', 'doctor_schedules')
	}

}
