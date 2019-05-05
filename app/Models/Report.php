<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model {
	protected $guarded = ['id'];
	public function date(){
		return $this->belongsTo('App\Models\Patient')
	}
}
