@extends('base')

@section('bodyy')
  <div class='modal'>
    <div class="modal-layout">
      {{ Form::open(['url' => 'dossier/update', 'method' => 'post', 'class' => 'form-layout']) }}
      <div class="group">
        <label for="">Naam:</label>
        {{ Form::input('text', 'inp_first_name', $dossier->first_name) }}
      </div>
      <div class="group">
        <label for="">Tussenvoegsel:</label>
        {{ Form::input('text', 'inp_insection', $dossier->insection) }}
      </div>
      <div class="group">
        <label for="">Achternaam:</label>
        {{ Form::input('text', 'inp_last_name', $dossier->last_name) }}
      </div>
      <div class="group">
        <label for="">Geboortedatum:</label>
        {{ Form::input('text', 'inp_date_of_birth', $dossier->date_of_birth) }}
        {{-- {{ Form::input('text', 'inp_date_of_birth', date('d-m-Y', strtotime($dossier->date_of_birth))) }} --}}
      </div>
      <div class="group">
        <label for="">Adres:</label>
        {{ Form::input('text', 'inp_address', $dossier->address, ['class' => 'split2_3']) }}
        {{ Form::input('text', 'inp_address_number', $dossier->address_number, ['class' => 'split1_3']) }}
      </div>
      <div class="group">
        <label for="">Woonplaats:</label>
        {{ Form::input('text', 'inp_city', $dossier->city) }}
      </div>
      <div class="group full-width">
        <label for="">Reden opnamen:</label>
        {{ Form::textarea('inp_reason', null, ["size" => '30x5']) }}
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
