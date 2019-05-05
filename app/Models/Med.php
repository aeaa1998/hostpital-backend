<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Med extends Model {
	protected $guarded = ['id'];
	public function patients(){
		return $this->belongsToMany('App\Models\Patient', 'med_patients')
	}

}
