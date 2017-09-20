@extends('base')

@section('bodyy')
  <div class="patient">
    {{ Form::open(['url' =>  '/dossier', 'method' => 'post', 'class' => 'form-layout']) }}
    {{ Form::input('text', 'inp', null, ["placeholder" => "Naam patiënt"]) }}
    {{ Form::submit("send", ["class" => 'hidden']) }}
    {{ Form::close() }}
  </div>
  <div class="overview">
    @include('loop.bed')
  </div>

@endsection
