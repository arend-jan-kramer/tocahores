@extends('base')

@section('bodyy')
  <div class='modal'>
    <div class="modal-layout head">
      <div class="kop">
        <div class="twee-3">
          Patiënt: {{$patient->first_name}}
        </div>
        <div class="een-3">Dossier nummer:<select id="dossier_id" class="right">
          @foreach($dossiers as $dossier)
            <option class="exists" value="{{$dossier->id}}">S{{sprintf("%07s", $dossier->id)}}</option>
          @endforeach
          <option value="{{$nr->id+1}}" selected>
            S{{ sprintf("%07s", $nr->id+1) }}
          </option>
          </select>
        </div>
      </div>
      {{ Form::open(['url' => 'dossier/update', 'method' => 'post', 'class' => 'form-layout', 'id' => 'autofill']) }}
      <div class="group">
        <label for="">Naam:</label>
        {{ Form::input('text', 'inp_first_name', $patient->first_name, ['class' => 'getName']) }}
      </div>
      <div class="group">
        <label for="">Tussenvoegsel:</label>
        {{ Form::input('text', 'inp_insection', $patient->insection) }}
      </div>
      <div class="group">
        <label for="">Achternaam:</label>
        {{ Form::input('text', 'inp_last_name', $patient->last_name) }}
      </div>
      <div class="group">
        <label for="">Geboortedatum:</label>
        {{-- {{ Form::input('text', 'inp_date_of_birth', $patient->date_of_birth) }} --}}
        {{ Form::input('text', 'inp_date_of_birth', date('d-m-Y', strtotime($patient->date_of_birth)), ['placeholder' => 'd-m-yyyy', 'id' => 'datum']) }}
      </div>
      <div class="group">
        <label for="">Adres:</label>
        {{ Form::input('text', 'inp_address', $patient->address, ['class' => 'split2_3']) }}
        {{ Form::input('number', 'inp_address_number', $patient->address_number, ['class' => 'split1_3']) }}
      </div>
      <div class="group">
        <label for="">Woonplaats:</label>
        {{ Form::input('text', 'inp_city', $patient->city) }}
      </div>
      <div class="group full-width">
        <label for="">Reden opnamen:</label>
        {{ Form::textarea('inp_reason', null, ["size" => '30x5', 'class' => 'description']) }}
      </div>
      <div class="group">
        <label for="">Afdeling</label>
        {{ Form::select('inp_department', $departments, null) }}
      </div>
      <div class="group right options">
        {{ Html::link('/1', 'Annuleren', ['class' => 'btn btn-cancel']) }}
        {{ Form::submit('Vraag bed op', ['class' => 'btn btn-send']) }}
      </div>
      {{ Form::close() }}
    </div>
  </div>
@endsection
