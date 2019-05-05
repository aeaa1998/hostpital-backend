<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model {
	protected $guarded = ['id'];
	public function date(){
		return $this->belongsTo('App\Models\Date')
	}
}
