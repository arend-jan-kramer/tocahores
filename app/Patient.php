<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
       'first_name',
       'insection',
       'last_name',
       'address',
       'address_number',
       'city',
       'date_of_birth',
     ];

     /**
      * The attributes that should be hidden for arrays.
      *
      * @var array
      */
     protected $hidden = [];

     public function dossiers() {
       return $this->hasMany(Dossier::class);
     }

     public function latest()
     {
       return $this->hasOne(Dossier::class)->latest();
     }
}
