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
      return view('layouts.overzicht')->with(compact('department', 'departmentall', 'emails'));
    }

    public function getPatient($id) {
      $patient = Patient::findorFail($id);
      return [$patient->dossiers, $patient];
    }

    public function dossier() {
      $patient = Patient::where('first_name', $_POST['inp'])
        ->orwhere('last_name', $_POST['inp'])
        ->first();
      $departments = Department::pluck('name', 'id');

      // if(!empty($patient)) {
      //   dd(Carbon::now()->toDateTimeString(), $patient->date_of_birth);
      // }else {
      //   dd(Carbon::now()->toDateTimeString());
      // }

      if(!$patient) {
        return view('layouts.newpatient')->with(compact('departments','emails'));
      }
      else {
        return view('layouts.patient')->with(compact('departments', 'patient', 'emails'));
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
        'date_of_birth' => carbon::createFromFormat('d-m-yy', $_POST['inp_date_of_birth'])->toDateTimeString(),
      ]);

      $patient_id = Patient::orderBy('id', 'desc')->first();
      $bed = Hospital_beds::where('status', 0)->first();

      Dossier::create([
        'patient_id' => $patient_id->id,
        'description' => $_POST['inp_reason'],
        'status' => 1,
        'hospital_bed_id' => $bed->id,
      ]);

      return redirect('1');
    }

    public function update() {
      $patient = Patient::where('first_name', $_POST['inp_first_name'])
        ->orwhere('last_name', $_POST['inp_first_name'])
        ->first();

      Patient::where('id', $patient->id)->update([
        'first_name' => $_POST['inp_first_name'],
        'insection' => $_POST['inp_insection'],
        'last_name' => $_POST['inp_last_name'],
        'address' => $_POST['inp_address'],
        'address_number' => $_POST['inp_address_number'],
        'city' => $_POST['inp_city'],
        'date_of_birth' => carbon::createFromFormat('d-m-yy', $_POST['inp_date_of_birth'])->toDateTimeString(),
      ]);

      $bed = Hospital_beds::where('status', 0)->where('department_id', $_POST['inp_department'])->first();

      Hospital_beds::where('id', $bed->id)->update([
        'status' => 1,
        'patient_id' => $patient->id,
      ]);

      Dossier::create([
        'patient_id' => $patient->id,
        'description' => $_POST['inp_reason'],
        'status' => 1,
        'hospital_bed_id' => $bed->id,
      ]);

      return redirect('1');
    }

    public function newuser() {
      // registreren van een nieuwe email gebruiker
      Emails::create(['email' => $_POST['create_email']."@ziekenhuis-rotterdam.nl"]);
      return redirect()->back();
    }

    public function deleteuser() {
      Emails::find($_POST['delete_email'])->delete();
      return redirect()->back();
    }
}
