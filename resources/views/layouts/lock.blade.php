@extends('base')

@section('bodyy')
  <div class='modal'>
    <div class="modal-layout small">
      {{ Form::open(['url' => '/unlock', 'method' => 'post', 'class' => 'form-layout']) }}
      <div class="group full-width">
        <label for="">Wachtwoord</label>
        {{ Form::input('text','unlock', null) }}
      </div>
      <div class="group">
        {{ Form::submit('unlock', ['class' => 'hidden']) }}
      </div>
      {{ Form::close() }}
    </div>
  </div>
@endsection
