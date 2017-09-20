<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class pattientController extends Controller
{
    public function index() {
        return $_POST['inp'];
    }
}
