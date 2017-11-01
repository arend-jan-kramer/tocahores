<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Carbon\Carbon;
use Carbon\CarbonInterval;
use Validator;

use App\Department;
use App\Hospital_beds;
use App\Rooms;
use App\Patient;
use App\Dossier;
use App\Emails;

class pattientController extends Controller
{
    public function index($id) {
      $date = Carbon::now();
      $date2 = $date->copy()->subMinutes(5);
      // $date2 = $date->copy()->subHours(2);
      $hospital_beds = Hospital_beds::where('status', 2)
        ->wherenotbetween('updated_at', [$date2, $date])
        ->update(['status' => 0]);
      $rooms = Rooms::get();
      $department = Department::find($id);
      $departmentall = Department::all();
      $emails = Emails::pluck('email', 'id');
      $time = array();

      foreach($rooms as $room) {
        $count = Hospital_beds::where('room', $room->id)->whereNotIn('status', [0])->count();
        $room_true = Hospital_beds::where('status', 2)->where('room', $room->id)->first();

        if($count == $room->x_bed){
          if($room->status != 1){
            Rooms::where('name', 'LIKE', '%'.$room->name.'%')->update(['status' => 1]);
          }
        }
        else {
          Rooms::where('name', 'LIKE', '%'.$room->name.'%')->update(['status' => 0]);
        }

        if($room->status == 1){
          // $room->updated_at = $room->updated_at->addHours(2);
          $room->updated_at = $room->updated_at->addMinutes(6);

          $now = Carbon::now();
          $uur = $room->updated_at->diffInHours($now);
          $minutes = $room->updated_at->diffInMinutes($now);

          if($minutes < 120 && $minutes > 60){
            $minutes = $minutes - 60;
          }

          if($room_true != null){
            $status = true;
          }else {
            $status = false;
          }
          $time += [
            $room->id => [
              'time' => 'Kamer vrij in '.$uur. ' uur '. $minutes . ' minuten',
              'status' => $status
            ]
          ];
        }
      }

      if(empty($department)){
        return redirect()->back();
      }

      return view('layouts.overzicht')->with(compact('department', 'departmentall', 'emails', 'bed', 'firstbed', 'time'));
    }

    public function getPatient($id) {
      $patient = Patient::findorFail($id);
      return [$patient->dossiers, $patient];
    }

    public function getPatientDossier($patient_name, $dossier_id){
      $patient = Patient::where('first_name',$patient_name)->first();
      $data = Dossier::where('patient_id', $patient->id)->where('id', $dossier_id)->first();
      return $data;
    }

    public function dismisPatient(Request $request) {
      $patient = Patient::findorFail($request->user_id);
      Dossier::where('patient_id', $patient->id)
        ->update(['status' => 0]);
      Hospital_beds::where('patient_id', $patient->id)
        ->update(['patient_id' => null, 'status' => 2]);

      return redirect()->back();
    }

    public function dossier(Request $request) {
      $patient = Patient::where('first_name', $request->inp)
        ->orwhere('last_name', $request->inp)
        ->first();
      $departments = Department::pluck('name', 'id');
      $nr = Dossier::orderBy('id','desc')->first();

      if(!$patient) {
        return view('layouts.newpatient')->with(compact('departments','emails', 'nr'));
      }
      else {
        $dossiers = Dossier::where('patient_id', $patient->id)->get();
        return view('layouts.patient')->with(compact('departments', 'patient', 'emails', 'nr', 'dossiers', 'dossiers_last'));
      }
    }

    public function create(Request $request) {
      $patient = Patient::create([
        'first_name' => $request->inp_first_name,
        'insection' => $request->inp_insection,
        'last_name' => $request->inp_last_name,
        'address' => $request->inp_address,
        'address_number' => $request->inp_address_number,
        'city' => $request->inp_city,
        'date_of_birth' => carbon::createFromFormat('d-m-yy', $request->inp_date_of_birth)->toDateTimeString(),
      ]);

      $patient_id = Patient::orderBy('id', 'desc')->first();

      $bed = Hospital_beds::where('status', 0)
        ->where('department_id', $request->inp_department)
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
        'description' => $request->inp_reason,
        'status' => 1,
        'hospital_bed_id' => $bed->id,
      ]);

      return redirect($bed->department_id);
    }

    public function update(Request $request) {
      $patient = Patient::where('first_name', $request->inp_first_name)
        ->orwhere('last_name', $request->inp_first_name)
        ->first();

      Patient::where('id', $patient->id)->update([
        'first_name' => $request->inp_first_name,
        'insection' => $request->inp_insection,
        'last_name' => $request->inp_last_name,
        'address' => $request->inp_address,
        'address_number' => $request->inp_address_number,
        'city' => $request->inp_city,
        'date_of_birth' => carbon::createFromFormat('d-m-yy', $request->inp_date_of_birth)->toDateTimeString(),
      ]);

      $dossier = Dossier::where('patient_id', $patient->id)
        ->where('status', 1)
        ->count();

      if($dossier == 1) {
        return redirect('1')->withErrors(['msg' => 'Deze patient is al in het ziekenhuis']);
      }else {
        $bed = Hospital_beds::where('status', 0)->where('department_id', $request->inp_department)->first();

        if(empty($bed)) {
          return redirect('1')->withErrors(['msg' => 'Geen bed vrij!']);
        }

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
          'patient_id' => $patient->id,
          'description' => $request->inp_reason,
          'status' => 1,
          'hospital_bed_id' => $bed->id,
        ]);
      }
      return redirect($bed->department_id);
    }

    public function getPatientScript($id) {
      $patient = Patient::first()->findorFail($id);
      $data = [
        'patient' => $patient,
        'dossier' => $patient->latest,
      ];
      return $data;
    }
}
