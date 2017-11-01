@extends('base')

@section('bodyy')
  <div class='modal'>
    <div class="modal-layout password">
      {{ Form::open(['url' => '/', 'method' => 'post', 'class' => 'form-layout']) }}
      <div class="group full-width">
        <label for="">Wachtwoord</label>
        {{ Form::input('password','unlock', null, ['autofocus' => true]) }}
      </div>
      @if($errors->has('msg')){!! "<div class='group full-width'><b class='warning'>".$errors->first()."</b></div>"!!}@endif
      {{ Form::submit('unlock', ['class' => 'hidden']) }}
      {{ Form::close() }}
    </div>
  </div>
@endsection
