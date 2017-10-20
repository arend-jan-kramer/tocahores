@extends('base')

@section('bodyy')
  <div class="menu">
    <div class="pattient">
      {{ Form::open(['url' =>  '/dossier', 'method' => 'post', 'class' => 'form-layout']) }}
      {{ Form::input('text', 'inp', null, ["placeholder" => "Naam patiënt", 'id' => 'dark']) }}
      {{ Form::submit("send", ["class" => 'hidden']) }}
      {{ Form::close() }}
      <div class="settings">
        <a href="#" data-toggle="modal" data-target="#settings">
          <img src="/img/settings.png">
        </a>
      </div>
    </div>
  </div>
  <div class="overview">
    <div class="header">
      <div class="title">
        Afdelingen
      </div>
      <div class="header_row">
        @foreach($departmentall as $departmentall)
          <div class="block">
            <a href="{{$departmentall->id}}" class="inner {{ Request::is($departmentall->id) ? 'active' : '' }}">
              {{ $departmentall->short_name }}
            </a>
          </div>
        @endforeach
      </div>
    </div>

    <div class="content">
        <div class="description">
          <div class="title bold capitalize">
            {{ $department->name }} <b class="warning">{{ $department->description}}</b>
          </div>
          @foreach($department->rooms as $room)
            <ul>
              <li>{{ $room->description }}</li>
              <li>
                @if($room->status == 0)
                  leeg
                @else
                  vol
                @endif
              </li>
              <li>kamer vrij over # uur ## minuten</li>
            </ul>
          @endforeach
      </div>
    </div>

    <div class="bed">
      @foreach($department->beds as $hbed)
        @if(strpos($hbed->name, 'b01') !== false)
          <div class="clear" style="clear:both;"></div>
        @endif
        <div class="row_block room_{{$hbed->room}}">
          <label for="{{ $hbed->name }}" class="radiobutton ">
            <input type="radio" name="patient" id="{{ $hbed->name }}" value="{{$hbed->patient_id}}" class="hidden" >
          </label>
          <div class="status color_{{$hbed->status}}"></div>
          <div class="number">
            {{ $hbed->name }}
          </div>
        </div>
      @endforeach
    </div>
  </div>

@endsection
