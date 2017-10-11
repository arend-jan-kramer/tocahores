<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function beds() {
      return $this->hasMany(Hospital_beds::class);
    }

    public function rooms() {
     return $this->hasMany(Rooms::class);
    }
}
