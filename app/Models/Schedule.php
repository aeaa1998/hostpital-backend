<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model {
	protected $guarded = ['id'];
	public function doctors() {
		return $this->hasMany('App\Models\Doctor');
	}

}
