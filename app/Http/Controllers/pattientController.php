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
      // test hierboven
      $department = Department::find($id);
      $departmentall = Department::all();
      $hospital_beds = Hospital_beds::all();

      if(empty($department)){
        return redirect()->back();
      }

      $emails = Emails::pluck('email', 'id');
      return view('layouts.overzicht')->with(compact('department', 'departmentall', 'emails'));
    }

    public function getPatient($id) {
      $patient = Patient::findorFail($id);
      return [$patient->dossiers, $patient];
    }

    public function dismisPatient(Request $request) {
      $patient = Patient::findorFail($request->user_id);
      Dossier::where('patient_id', $patient->id)
        ->update([
          'status' => 0,
        ]);
      Hospital_beds::where('patient_id', $patient->id)
        ->update(['patient_id' => null, 'status' => 2]);
      return redirect()->back();
    }

    public function dossier() {
      $patient = Patient::where('first_name', $_POST['inp'])
        ->orwhere('last_name', $_POST['inp'])
        ->first();
      $departments = Department::pluck('name', 'id');

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

      $bed = Hospital_beds::where('status', 0)
        ->where('department_id', $_POST['inp_department'])
        ->where('patient_id', null)
        ->first();

      $bed->status = 1;
      $bed->patient_id = $patient->id;
      $bed->save();
      $bed_count = Hospital_beds::where('room', $bed->room)
      ->where('patient_id', null)
      ->where('status', 0)
      ->count();

      if(empty($bed_count)){
        Rooms::find($bed->room)->update([
          'status' => 1,
        ]);
      }

      Dossier::create([
        'patient_id' => $patient_id->id,
        'description' => $_POST['inp_reason'],
        'status' => 1,
        'hospital_bed_id' => $bed->id,
      ]);

      return redirect($bed->department_id);
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

      $dossier = Dossier::where('patient_id', $patient->id)
        ->where('status', 1)
        ->count();

      if($dossier >= 0) {
        return redirect('1')->withErrors(['msg' => 'Deze patient is al in het ziekenhuis']);
      }else {
        $bed = Hospital_beds::where('status', 0)->where('department_id', $_POST['inp_department'])->first();

        if(empty($bed)) {
          return redirect('1')->withErrors(['msg' => 'Geen bed vrij!']);
        }

        $bed->status = 1;
        $bed->patient_id = $patient->id;
        $bed->save();

        Dossier::create([
          'patient_id' => $patient->id,
          'description' => $_POST['inp_reason'],
          'status' => 1,
          'hospital_bed_id' => $bed->id,
        ]);
      }
      return redirect($bed->department_id);
    }

    public function newuser(Request $request) {
      // registreren van een nieuwe email gebruiker
      $this->validate($request, [
        'email' => 'max:15|min:3|required',
      ]);
      Emails::create(['email' => $request->create_email."@ziekenhuis-rotterdam.nl"]);
      return redirect()->back();
    }

    public function deleteuser() {
      Emails::find($_POST['delete_email'])->delete();
      return redirect()->back();
    }
}
