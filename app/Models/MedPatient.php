<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedPatient extends Model {
	protected $guarded = ['id'];
	public function patient(){
		return $this->belongsTo('App\Models\Patient')
	}
	public function med(){
		return $this->belongsTo('App\Models\Med')
	}


}
