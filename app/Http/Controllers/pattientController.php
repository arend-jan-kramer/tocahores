<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use Carbon\Carbon;

use App\Department;
use App\Hospital_beds;
use App\Rooms;
use App\Patient;
use App\Dossier;
use App\Emails;

class pattientController extends Controller
{
    public function lock() {
      return view('layouts.lock')->with(compact('emails'));
    }

    public function unlock() {
      return 'unlock this';
    }

    public function index($id) {
      $departmentall = Department::all();
      $department = Department::findorFail($id);
      $emails = Emails::pluck('email', 'id');
      // return $department->beds;
      return view('layouts.overzicht')->with(compact('department', 'departmentall', 'emails'));
    }

    // public function index($id) {
    //   $departments = Department::all();
    //   $hospital_beds = Hospital_beds::where('department_id', $id)->get();
    //   $patients = Patient::all();
    //   $rooms = Rooms::all();
    //   $nr = $id - 1;
    //   $emails = Emails::pluck('email', 'id');
    //   return view('layouts.overzicht')->with(compact('departments', 'rooms', 'hospital_beds', 'nr', 'patients', 'emails'));
    // }

    public function dossier() {
      $departments = Department::pluck('name', 'id');
      $dossier = Patient::where('first_name', $_POST['inp'])
      ->orwhere('last_name', $_POST['inp'])
      ->first();
      if(!$dossier) {
        return view('layouts.emptydossier')->with(compact('departments','emails'));
      }
      else {
        return view('layouts.dossier')->with(compact('departments', 'dossier', 'emails'));
      }
    }

    public function create() {
      $patient = Patient::create([
        'first_name' => $_POST['inp_first_name'],
        'insection' => $_POST['inp_insection'],
        'last_name' => $_POST['inp_last_name'],
        'address' => $_POST['inp_address'],
        'address_number' => $_POST['inp_address_number'],
        'city' => $_POST['inp_city'],
        'date_of_birth' => $_POST['inp_date_of_birth'],
        // 'date_of_birth' => carbon::createFromFormat('d-m-yy', $_POST['inp_date_of_birth'])->toDateTimeString(),
      ]);
      Dossier::create([
        'pattient_id' => $patient->id,
        'description' => $_POST['inp_reason'],
        'status' => 1,
        'hospital_bed_id' => 1,
      ]);
      return redirect('1');
    }

    public function update() {
      $patient = Patient::where('first_name', $_POST['inp'])
        ->orwhere('last_name', $_POST['inp_first_name'])
        ->first();
      return $patient;
    }

    public function newuser() {
      // registreren van een nieuwe email gebruiker
      Emails::create([
        'email' => $_POST['create_email'],
      ]);
      return redirect()->back();
    }

    public function deleteuser() {
      return 'delete user';
    }
}
