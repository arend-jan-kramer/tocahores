<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public $timestamps = false;
    
    public function rooms(){
      return $this->hasMany(Rooms::class);
    }

    public function beds() {
      return $this->hasMany(Hospital_beds::class);
    }
}
