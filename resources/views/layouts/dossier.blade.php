@extends('base')

@section('bodyy')
  {{-- <div class="patient">
    {{ Form::open(['url' =>  '/dossier', 'method' => 'post']) }}
    {{ Form::input('text', 'inp', null, ["placeholder" => "hello"]) }}
    {{ Form::submit("send", ["class" => 'hidden']) }}
    {{ Form::close() }}
  </div>
  <div class="overview">
    @include('loop.bed')
  </div> --}}
  <div class='modal'>
    <div class="modal-layout">
      {{ Form::open(['url' => 'dossier/create', 'method' => 'post', 'class' => 'form-layout']) }}
      <div class="group">
        <label for="">Naam:</label>
        {{ Form::input('text', 'inp_name', $_POST['inp']) }}
      </div>
      <div class="group">
        <label for="">Tussenvoegsel:</label>
        {{ Form::input('text', 'inp_insertion', null) }}
      </div>
      <div class="group">
        <label for="">Achternaam:</label>
        {{ Form::input('text', 'inp_last_name', null) }}
      </div>
      <div class="group">
        <label for="">Leeftijd:</label>
        {{ Form::input('text', 'inp_age', null) }}
      </div>
      <div class="group">
        <label for="">Adres:</label>
        {{ Form::input('text', 'inp_address', null, ['class' => 'split2_3']) }}
        {{ Form::input('text', 'inp_house_number', null, ['class' => 'split1_3']) }}
      </div>
      <div class="group">
        <label for="">Woonplaats:</label>
        {{ Form::input('text', 'inp_city', null) }}
      </div>
      <div class="group full-width">
        <label for="">Reden opnamen:</label>
        {{ Form::textarea('inp_reason', null, ["size" => '30x5']) }}
      </div>
      <div class="group">
        <label for="">Afdeling</label>
        {{ Form::select('inp_section',["A" => 'A', "B" => "B"]) }}
      </div>
      <div class="group">
        <label for="">Medicatie:</label>
        {{ Form::input('text', 'inp_medication', null) }}
      </div>
      <div class="group full-width">
        <label for="">Medicatie huidige behandeling:</label>
        {{ Form::textarea('inp_current_medication', null, ["size" => '30x5']) }}
      </div>
      <div class="group right options">
        {{ Form::input('button', null, 'Leeg velden', ['class' => 'btn btn-cancel']) }}
        {{ Form::submit('Vraag bed op', ['class' => 'btn btn-send']) }}
      </div>
      {{ Form::close() }}
    </div>
  </div>
@endsection
