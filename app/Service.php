<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function team() {
		# Service belongs to Team
		# Define an inverse one-to-many relationship.
		return $this->belongsTo('App\Team');
	}
}
