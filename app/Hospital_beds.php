<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital_beds extends Model
{
    public function department(){
      return $this->belongsTo(Department::class);
    }

}
