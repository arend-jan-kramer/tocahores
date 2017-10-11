<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dossier extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
       'pattient_id',
       'description',
       'status',
       'hospital_bed_id',
     ];

     /**
      * The attributes that should be hidden for arrays.
      *
      * @var array
      */
     protected $hidden = [];

     public function dossier() {
       return $this->belongsTo(Pattient::class);
     }
}
