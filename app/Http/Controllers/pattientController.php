<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class pattientController extends Controller
{
    public function index() {
        return view('layouts.overzicht');
    }
    public function dossier() {
      return view('layouts.dossier');
    }
}
